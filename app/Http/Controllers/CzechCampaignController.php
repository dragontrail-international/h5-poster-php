<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CzechCampaignController extends Controller
{
    public function generate()
    {
        $canvasWidth = 1000;
        $canvasHeight = 1618;
        $headerHeight = 170;
        $themeImageHeight = 756;

        // 准备画布
        $canvas = Image::canvas($canvasWidth, $canvasHeight, '#fff');

        // 放上 logo
        $logo = Image::make('static/czech-campaign/logo.png')
            ->fit(256, 67);
        $canvas->insert($logo, 'top-left', 50, 50);

        // 放 logo 右边的主题分类文本图
        $themeCategory = Image::make('static/czech-campaign/theme-category-theme-nature.png')
            ->fit(256, 67);
        $canvas->insert($themeCategory, 'top-right', 30, 50);

        // 放主题图片
        $themeImage = Image::make('static/czech-campaign/theme-image.jpg')
            ->fit($canvasWidth, $themeImageHeight);
        $canvas->insert($themeImage, 'top-left', 0, $headerHeight);

        // 准备盖在主题图片下部的锯齿样的云
        $floatingCloud = Image::make('static/czech-campaign/theme-image-cover-cloud.png')
            ->resize($canvasWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        // 放好云
        $canvas->insert($floatingCloud, 'top-left', 0, $headerHeight + $themeImageHeight - $floatingCloud->height());

        // 放好头像
        $avatar = Image::make('static/czech-campaign/avatar.jpg')->fit(100, 100);
        $canvas->insert($avatar, 'top-left', 70, $headerHeight + $themeImageHeight + 16);

        // 给头像盖个图像, 让头像看起来是个圆的
        $avatarCover = Image::make('static/shared/white-rectangle-transparent-circle-100x100.png');
        $canvas->insert($avatarCover, 'top-left', 70, $headerHeight + $themeImageHeight + 16);

        // 昵称, 不折行了, 太了了就截断
        $trimmedNicknameSegments = explode("\r\n", mb_wordwrap('温柔的码农Bond超长名字超长名字超长名字超长名字超长名字', 12));
        $trimmedNickname = count($trimmedNicknameSegments) > 1 ? $trimmedNicknameSegments[0] . '...' : $trimmedNicknameSegments[0];
        $canvas->text($trimmedNickname, 200, 1015, function ($font) {
            $font->file(storage_path('fonts/noto-sans-sc-all-500-normal.woff'));
            $font->size(50);
            $font->color('#444');
            $font->align('left');
        });

        // 准备图片描述文本
        $description = explode("\n", mb_wordwrap('位于赫拉德茨州，可能是捷克共和国最美丽壮观的水坝，于1964年被认定为国家技术纪念碑。', 19));

        // 文本要手动打断，一行一行放上去
        for ($i = 0; $i < count($description); $i++) {
            $canvas->text($description[$i], 70, 1138 + $i * 75, function ($font) {
                $font->file(storage_path('fonts/noto-sans-sc-all-500-normal.woff'));
                $font->size(42);
                $font->color('#444');
                $font->align('left');
            });
        }

        // 底部色块
        $canvas->rectangle(0, $canvasHeight - 225, $canvasWidth, $canvasHeight, function ($draw) {
            $draw->background('#8da46f');
        });

        // 色块上的文本
        $canvas->rectangle(0, $canvasHeight - 225, $canvasWidth, $canvasHeight, function ($draw) {
            $draw->background('#8da46f');
        });

        // 准备图片描述文本
        $description = explode("\n", mb_wordwrap('我正在参观捷克最壮美的水坝！→', 11));

        // 文本要手动打断，一行一行放上去
        for ($i = 0; $i < count($description); $i++) {
            $canvas->text($description[$i], 70, ($canvasHeight - 120) + 60 * $i, function ($font) {
                $font->file(storage_path('fonts/noto-sans-sc-all-700-normal.woff'));
                $font->size(45);
                $font->color('#fff');
                $font->align('left');
            });
        }

        // 二维码白色底色块
        $qrCodeBg = Image::make('static/shared/white-rounded-rectangle-300x300.png')->fit(220, 220);
        $canvas->insert($qrCodeBg, 'top-right', 50, $canvasHeight - 270);

        // 二维码
        $qrCode = Image::make('static/czech-campaign/qrcode.png')->fit(180, 180);
        $canvas->insert($qrCode, 'top-right', 70, $canvasHeight - 248);

        // 编码一下，给到视图，视图直接把 $img->encoded 给到 img 标签 src 属性即可
        $canvas->encode('data-url');

        return view('czech_campaign', [
            'img' => $canvas,
        ]);
    }
}
