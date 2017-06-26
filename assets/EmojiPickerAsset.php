<?php

namespace app\assets;

use yii\web\AssetBundle;

class EmojiPickerAsset extends AssetBundle
{

    public
        $sourcePath = '@npm/onesignal-emoji-picker/lib';

    public $css = [
        'css/emoji.css',
    ];

    public $js = [
        'js/config.js',
        'js/util.js',
        'js/jquery.emojiarea.js',
        'js/emoji-picker.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
    ];
}

