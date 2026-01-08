<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     protected $fillable = [
        'web_name',
        'web_logo',   
        'favicon',
        'home_about',
        'home_m_tiitle',
        'home_m_descrip',
        'cate_m_tiitle',
        'cate_m_descrip',
        'store_m_tiitle',
        'store_m_descrip',
        'stores_m_tiitle',
        'stores_m_descrip',
        'contact_m_tiitle',
        'contact_m_descrip',
        'setting_region',
        'featuer_m_tiitle',
        'featuer_m_descrip',
        'event_m_tiitle',
        'event_m_descrip',
        'seoheader',
        'keyword',
        'socails',
        'seofooter',
        'streetAddress',
        'addressLocality',
        'addressRegion',
        'postalCode',
        'addressCountry',
        'lange',
        'advertise_m_tiitle',
        'advertise_m_descrip',
        'advertise_contect'
          

    ];
     public function region()
    {
        return $this->belongsTo(Region::class, 'setting_region');
    }
}
