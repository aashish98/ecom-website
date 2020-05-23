
<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Sony Headphones',
            'slug'  => 'sony',
            'details' => '2019. sony high quality  (bass, 2019)',
            'price' => 9999,
            'cat_id' => 7,
            'description'=>''
            
        ]);
        Product::create([
            'name' => 'Sennheiser Headphones',
            'slug'  => 'head5',
            'details' => 'ultra base headphones (overear, 2020)',
            'price' => 14499,
            'cat_id' => 7,
            'description'=>'With no wires in the way, bass SoundSport Wireless Sports Earbuds keep you moving with powerful audio. Perfect for exercise and running with a sweat and weather resistant design'
            
        ]);
        Product::create([
            'name' => 'Audio-Technica Headphones',
            'slug'  => 'head4',
            'details' => '2019.  high quality  (bass, 2019)',
            'price' => 12999,
            'cat_id' => 7,
            'description'=>'With wires in the way, bass SoundSport Wireless Sports Earbuds keep you moving with powerful audio. Perfect for exercise and running with a sweat and weather resistant design'
            
        ]);
        Product::create([
            'name' => 'Grado Headphones',
            'slug'  => 'head3',
            'details' => '2019.  high quality  (bass, 2019)',
            'price' => 13999,
            'cat_id' => 7,
            'description'=>'With wires in the way,bass SoundSport Wireless Sports Earbuds keep you moving with powerful audio. Perfect for exercise and running with a sweat and weather resistant design'
            
        ]);
        Product::create([
            'name' => 'AKG Headphones',
            'slug'  => 'wirelessHead2',
            'details' => '2019. Akg high quality  (bass, 2019)',
            'price' => 19999,
            'cat_id' => 7,
            'description'=>'With no wires in the way, bass SoundSport Wireless Sports Earbuds keep you moving with powerful audio. Perfect for exercise and running with a sweat and weather resistant design'
            
        ]);
        Product::create([
            'name' => 'Shure Headphones',
            'slug'  => 'wirelessHeadphones',
            'details' => '2019. SHure high quality  (bass, 2018)',
            'price' => 15599,
            'cat_id' => 7,
            'description'=>'With no wires in the way, bass SoundSport Wireless Sports Earbuds keep you moving with powerful audio. Perfect for exercise and running with a sweat and weather resistant design'
            
        ]);
    }
}

