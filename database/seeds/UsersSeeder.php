<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin role
        $SuperAdminRole = new Role();
        $SuperAdminRole->name = "SuperAdmin";
        $SuperAdminRole->display_name = "SuperAdmin";
        $SuperAdminRole->save();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = '132339';
        $admin->password = bcrypt('132339');
        $admin->avatar = "admin_avatar.png";
        $admin->is_verified = 1;
        $admin->save();
        $admin->attachRole($SuperAdminRole);

        // Create AdminNpk role
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "member";
        $memberRole->save();

        $member = new User();
        $member->name = 'Yusup Supriatna';
        $member->email = '197605';
        $member->password = bcrypt('197605');
        $member->avatar = "admin_avatar.png";
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);

        $member = new User();
        $member->name = 'Ibnu Radhi';
        $member->email = '730254';
        $member->password = bcrypt('730254');
        $member->avatar = "admin_avatar.png";
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);

        $member = new User();
        $member->name = 'Hane Hasanudin';
        $member->email = '161458';
        $member->password = bcrypt('161458');
        $member->avatar = "admin_avatar.png";
        $member->is_verified = 1;
        $member->save();
        $member->attachRole($memberRole);

        // Create AdminBillingAccount role
        $AdminBillingAccountRole = new Role();
        $AdminBillingAccountRole->name = "AdminBillingAccount";
        $AdminBillingAccountRole->display_name = "AdminBillingAccount";
        $AdminBillingAccountRole->save();

        $billing = new User();
        $billing->name = 'Bu Nur Ismu';
        $billing->email = '720474';
        $billing->password = bcrypt('720474');
        $billing->avatar = "member_avatar.png";
        $billing->is_verified = 1;
        $billing->save();
        $billing->attachRole($AdminBillingAccountRole);

        // Create CreateBa role
        $CreateBaRole = new Role();
        $CreateBaRole->name = "CreateBa";
        $CreateBaRole->display_name = "CreateBa";
        $CreateBaRole->save();

        $create = new User();
        $create->name = 'Nurul';
        $create->email = '123456';
        $create->password = bcrypt('123456');
        $create->avatar = "member_avatar.png";
        $create->is_verified = 1;
        $create->save();
        $create->attachRole($CreateBaRole);

        // Create UserBilling role
        $UserBillingRole = new Role();
        $UserBillingRole->name = "UserBilling";
        $UserBillingRole->display_name = "UserBilling";
        $UserBillingRole->save();

        $userbilling = new User();
        $userbilling->name = 'Sample User';
        $userbilling->email = '456789';
        $userbilling->password = bcrypt('456789');
        $userbilling->avatar = "admin_avatar.png";
        $userbilling->is_verified = 1;
        $userbilling->save();
        $userbilling->attachRole($UserBillingRole);

        // Create AdminInvoice role
        $AdminInvoiceRole = new Role();
        $AdminInvoiceRole->name = "AdminInvoice";
        $AdminInvoiceRole->display_name = "AdminInvoice";
        $AdminInvoiceRole->save();

        $invoice = new User();
        $invoice->name = 'Admin Invoice';
        $invoice->email = '654321';
        $invoice->password = bcrypt('654321');
        $invoice->avatar = "admin_avatar.png";
        $invoice->is_verified = 1;
        $invoice->save();
        $invoice->attachRole($AdminInvoiceRole);

        // Create Aoc role
        $AocRole = new Role();
        $AocRole->name = "Aoc";
        $AocRole->display_name = "Aoc";
        $AocRole->save();

        $aoc = new User();
        $aoc->name = 'Sample AOC';
        $aoc->email = '121212';
        $aoc->password = bcrypt('121212');
        $aoc->avatar = "admin_avatar.png";
        $aoc->is_verified = 1;
        $aoc->save();
        $aoc->attachRole($AocRole);

        // Create AdminUtip role
        $AdminUtipRole = new Role();
        $AdminUtipRole->name = "AdminUtip";
        $AdminUtipRole->display_name = "AdminUtip";
        $AdminUtipRole->save();

        $utip = new User();
        $utip->name = 'Admin Utip';
        $utip->email = '641536';
        $utip->password = bcrypt('641536');
        $utip->avatar = "admin_avatar.png";
        $utip->is_verified = 1;
        $utip->save();
        $utip->attachRole($AdminUtipRole);

        // Create Segment role
        $SegmentRole = new Role();
        $SegmentRole->name = "Segment";
        $SegmentRole->display_name = "Segment";
        $SegmentRole->save();

        $segmen = new User();
        $segmen->name = 'Sample Segmen';
        $segmen->email = '232323';
        $segmen->password = bcrypt('232323');
        $segmen->avatar = "admin_avatar.png";
        $segmen->is_verified = 1;
        $segmen->save();
        $segmen->attachRole($SegmentRole);

        // Create Admin sample
    

        

        

    }
}
