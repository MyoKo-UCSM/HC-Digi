<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Nrc;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NrcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nrc::query()->delete();
        
        // Define nrcs data
        $nrcs = [
            [
                'nrc_code' => '1',
                'name_en' => 'AhGaYa',
                'name_mm' => '(အဂယ) အင်ဂျန်းယန်'
            ],   
            [
                'nrc_code' => '1',
                'name_en' => 'BaMaNa',
                'name_mm' => '(ဗမန) ဗန်းမော်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'KhaPhaNa',
                'name_mm' => '(ခဖန) ချီဖွေ'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'DaPhaYa',
                'name_mm' => '(ဒဖယ) ဒေါ့ဖုန်းယန်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'HaPaNa',
                'name_mm' => '(ဟပန) ဟိုပင်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'KaMaNa',
                'name_mm' => '(ကမန) ကာမီ'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'KhaLaPha',
                'name_mm' => '(ခလဖ) ခေါင်လန်ဖူး'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'LaGaNa',
                'name_mm' => '(လဂန) လွယ်ဂျယ်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaKhaBa',
                'name_mm' => '(မခဘ) မချမ်းဘော'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaSaNa',
                'name_mm' => '(မစန) မံစီ'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaNyaNa',
                'name_mm' => '(မညန) မိုးညင်း'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaKaTa',
                'name_mm' => '(မကတ) မိုးကောင်း'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaMaNa',
                'name_mm' => '(မမန) မိုးမောက်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'MaKaNa',
                'name_mm' => '(မကန) မြစ်ကြီးနား'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'NaMaNa',
                'name_mm' => '(နမန) နောင်မွန်း'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'PhaKaNa',
                'name_mm' => '(ဖကန) ဖားကန့်'
            ],           
            
            [
                'nrc_code' => '1',
                'name_en' => 'PaTaAh',
                'name_mm' => '(ပတအ) ပူတာအို'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'YaKaNa',
                'name_mm' => '(ရကန) ရွှေကူ'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'SaBaNa',
                'name_mm' => '(ဆဘန) ဆင်ဘို'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'SaLaNa',
                'name_mm' => '(ဆလန) ဆော့လော'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'SaPaBa',
                'name_mm' => '(ဆပဘ) ဆွမ်ပရာဘွမ်'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'TaNaNa',
                'name_mm' => '(တနန) တနိုင်း'
            ],
            [
                'nrc_code' => '1',
                'name_en' => 'WaMaNa',
                'name_mm' => '(ဝမန) ဝင်းမော်'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'BaLaKha',
                'name_mm' => '(ဘလခ) ဘော်လခဲ'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'DaMaSa',
                'name_mm' => '(ဒမဆ) ဒီမောဆိုး'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'LaKaNa',
                'name_mm' => '(လကန) လွိုင်ကော်'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'MaSaNa',
                'name_mm' => '(မဆန) မယ်ဆည်နန်'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'PhaSaNa',
                'name_mm' => '(ဖဆန) ဖားဆောင်း'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'PhaYaSa',
                'name_mm' => '(ဖရဆ) ဖရူးဆိုး'
            ],
            [
                'nrc_code' => '2',
                'name_en' => 'YaTaNa',
                'name_mm' => '(ရတန) ရှားတော်'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'LaBaNa',
                'name_mm' => '(လဘန) လှိုင်းဘွဲ့'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'KaKaYa',
                'name_mm' => '(ကကရ) ကော့ကရိတ်'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'KaSaKa',
                'name_mm' => '(ကဆက) ကြာအင်းဆိပ်ကြီး'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'KaDaNa',
                'name_mm' => '(ကဒန) ကျုံဒိုး'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'MaWaTa',
                'name_mm' => '(မဝတ) မြဝတီ'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'PhaAhNa',
                'name_mm' => '(ဖအန) ဖားအံ'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'BaAhNa',
                'name_mm' => '(ဘအန) ဘားအံ'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'PhaPaNa',
                'name_mm' => '(ဖပန) ဖျာပွန်'
            ],
            [
                'nrc_code' => '3',
                'name_en' => 'ThaTaNa',
                'name_mm' => '(သတန) သံတောင်'
            ],[
                'nrc_code' => '4',
                'name_en' => 'HaKhaNa',
                'name_mm' => '(ဟခန) ဟားခါး'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'HtaTaLa',
                'name_mm' => '(ထတလ) ထန်တလန်'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'KaPaLa',
                'name_mm' => '(ကပလ) ကန်ပက်လက်'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'MaTaPa',
                'name_mm' => '(မတပ) မတူပီ'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'MaTaNa',
                'name_mm' => '(မတန) မင်းတပ်'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'PhaLaNa',
                'name_mm' => '(ဖလန) ဖလမ်း'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'PaLaWa',
                'name_mm' => '(ပလဝ) ပလက်ဝ'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'TaTaNa',
                'name_mm' => '(တတန) တီးတိန်'
            ],
            [
                'nrc_code' => '4',
                'name_en' => 'TaZaNa',
                'name_mm' => '(တဇန) တွန်းဇံ'
            ],
            [
                'nrc_code' => '5',
                'name_en' => 'AhYaTa',
                'name_mm' => '(အရတ) အရာတော်'
            ],
            [
                'nrc_code' => '5',
                'name_en' => 'BaMaNa',
                'name_mm' => '(ဗမန) ဗန်းမောက်'
            ],[
                'nrc_code' => '5',
                'name_en' => 'BaTaLa',
                'name_mm' => '(ဘတလ) ဘုတလင်'
            ],      
        ];

        // Insert nrcs data
        //Nrc::insert($nrcs);
        foreach ($nrcs as $nrc) {
            // Generate UUID for the primary key
            $nrc['id'] = Str::uuid();
            // Insert the record into the database
            Nrc::create($nrc);
        }
    }
}
