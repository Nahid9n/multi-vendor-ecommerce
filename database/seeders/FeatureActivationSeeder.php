<?php

namespace Database\Seeders;

use App\Models\FeatureActivation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureActivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureActivation::create([
            'name'=> 'HTTPS_Activation',
            'type'=> 'System',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Maintenance_Mode_Activation',
            'type'=> 'System',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Vendor_System_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Classified_Product',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Wallet_System_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Coupon_System_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Pickup_Point_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Conversation_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Seller_Product_Manage_By_Admin',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Admin_Approval_On_Seller_Product',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Email_Verification',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Order_Invoice_Email',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Product_Query_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Guest_Checkout_Activation',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Wholesale_Product_for_Seller',
            'type'=> 'Business Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Paypal_Payment_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Stripe_Payment_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'SSlCommerz_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Bkash_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Nagad_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Rocket_Activation',
            'type'=> 'Payment Related',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Facebook_login',
            'type'=> 'Social Media Login',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Google_login',
            'type'=> 'Social Media Login',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Apple_login',
            'type'=> 'Social Media Login',
            'status'=> 1,
        ]);
        FeatureActivation::create([
            'name'=> 'Twitter_login',
            'type'=> 'Social Media Login',
            'status'=> 1,
        ]);
    }
}
