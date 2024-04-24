<?php

namespace App\Services;

use App\Interfaces\Services\HomeServiceInterface;

class HomeService implements HomeServiceInterface
{
    public function getOurTheme($request)
    {
        $our_theme_row = $request->our_theme_row;

        $returnHtml = view('admin.home._our_theme')
            ->with('our_theme_row', $our_theme_row)
            ->render();

        return $returnHtml;
    }

    public function getOrganizedBy($request)
    {
        $organized_by_row = $request->organized_by_row;

        $returnHtml = view('admin.home._organized_by')
            ->with('organized_by_row', $organized_by_row)
            ->render();

        return $returnHtml;
    }

    public function getCoOrganizedBy($request)
    {
        $co_organized_by_row = $request->co_organized_by_row;

        $returnHtml = view('admin.home._co_organized_by')
            ->with('co_organized_by_row', $co_organized_by_row)
            ->render();

        return $returnHtml;
    }

    public function getSponsoredBy($request)
    {
        $sponsored_by_row = $request->sponsored_by_row;

        $returnHtml = view('admin.home._sponsored_by')
            ->with('sponsored_by_row', $sponsored_by_row)
            ->render();

        return $returnHtml;
    }

    public function getSpeaker($request)
    {
        $speaker_row = $request->speaker_row;

        $returnHtml = view('admin.home._speaker')
            ->with('speaker_row', $speaker_row)
            ->render();

        return $returnHtml;
    }
}
