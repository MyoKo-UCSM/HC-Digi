<?php

namespace App\Repositories;

use App\Helpers\AdminHelper;
use App\Interfaces\Repositories\HomeRepositoryInterface;
use App\Models\Home;

class HomeRepository implements HomeRepositoryInterface
{
    public function getHomeIndex()
    {
        return Home::first();
    }
    
    public function saveHomeData($request)
    {
        $requestData         = $request->all();
        $organized_images    = [];
        $co_organized_images = [];
        $sponsored_images    = [];
        $speaker_images      = [];

        if ($request->organized_by_image) {
            foreach ($request->organized_by_image as $organized_by_image) {
                $organized_images[] = AdminHelper::storageFileExist($organized_by_image);
            }
        }

        if ($request->co_organized_by_image) {
            foreach ($request->co_organized_by_image as $co_organized_by_image) {
                $co_organized_images[] = AdminHelper::storageFileExist($co_organized_by_image);
            }
        }

        if ($request->sponsored_by_image) {
            foreach ($request->sponsored_by_image as $sponsored_by_image) {
                $sponsored_images[] = AdminHelper::storageFileExist($sponsored_by_image);
            }
        }

        if ($request->speaker_image) {
            foreach ($request->speaker_image as $image) {
                $speaker_images[] = AdminHelper::storageFileExist($image);
            }
        }

        $requestData['our_themes'] = [
            'title'       => $request->our_theme_title,
            'description' => $request->our_theme_description,
        ];

        $requestData['organized_by'] = [
            'image'     => $organized_images,
            'image_alt' => $request->organized_by_image_alt,
            'link'      => $request->organized_by_link,
        ];

        $requestData['co_organized_by'] = [
            'image'     => $co_organized_images,
            'image_alt' => $request->co_organized_by_image_alt,
            'link'      => $request->co_organized_by_link,
        ];

        $requestData['sponsored_by'] = [
            'image'     => $sponsored_images,
            'image_alt' => $request->sponsored_by_image_alt,
            'link'      => $request->sponsored_by_link,
        ];

        $requestData['speakers'] = [
            'image'       => $speaker_images,
            'name'        => $request->speaker_name,
            'institution' => $request->speaker_institution,
            'link'        => $request->link,
        ];

        $home = Home::first();

        if ($home) {
            $home->update($requestData);
        } else {
            $home = Home::create($requestData);
        }

        return $home;
    }
}
