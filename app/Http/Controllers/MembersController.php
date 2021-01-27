<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateMemberRequest;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->connection = new User;
    }
    public function index(Request $request, Builder $htmlBuilder)
    {
        $members = Role::where('name', 'member')->first()->users;
        //     echo"<pre>";
        //     print_r(json_encode($members));
        // echo"</pre>";
        // die();
        
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $avatar = "member_avatar.png";
        $veri = "1";
        

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => $avatar,
            'is_verified' =>$veri
            );
        $member = User::create($data);

        // Set role
        $memberRole = Role::where('name', 'member')->first();
        $member->attachRole($memberRole);
      
            // echo "<pre>";
            //   print_r($data);
            // echo "</pre>";
            // die();
      
           
            
            if ($member) {
              \notification('sukses','Data Berhasil Di Tambahkan !!!');
              return redirect('members');
            }else{
              \notification('warning','Data Gagal Di Tambahkan !!!');
              return redirect('members');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $password = '123456';

        $data = $request->all();

        $data['password'] = bcrypt($password);

        // bypass verifikasi
        $data['is_verified'] = 1;

        $member = User::create($data);

        // Set role
        $memberRole = Role::where('name', 'member')->first();
        $member->attachRole($memberRole);

        // Isi field cover jika ada cover yang diupload
        if ($request->hasFile('avatar')) {

            // Mengambil file yang diupload
            $uploaded_avatar = $request->file('avatar');

            // Mengambil extension file
            $extension = $uploaded_avatar->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . "." . $extension;

            // Menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_avatar->move($destinationPath, $filename);

            // Mengisi field cover di book dengan filename yang baru dibuat
            $member->avatar = $filename;
            $member->save();

        } else {

            // Jika tidak ada cover yang diupload, pilih member_avatar.png
            $filename = "member_avatar.png";
            $member->avatar = $filename;
            $member->save();
        }

        // Kirim email
        Mail::send('auth.emails.invite', compact('member', 'password'), function($m) use ($member) {
            $m->to($member->email, $member->name)->subject('Anda telah didaftarkan di Cappucino Application!');
        });

        Session::flash("flash_notification", [
            "level"     =>  "success",
            "icon" => "fa fa-check",
            "message"   =>  "Berhasil menyimpan data user dengan username " . "<strong>" . $data['email'] . "</strong>" . " dan password <strong>" . $password . "</strong>."
        ]);

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::find($id);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::find($id);

        return view('members.edit')->with(compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $member = User::find($id);

        $member->update($request->only('name', 'email'));

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Berhasl menyimpan $member->name"
        ]);

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = User::find($id);

        if ($member->hasRole('member')) {

            $member->delete();

            Session::flash("flash_notification", [
                "level" => "success",
                "icon" => "fa fa-check",
                "message" => "User berhasil dihapus"
            ]);
        }

        return redirect()->route('members.index');
    }
}
