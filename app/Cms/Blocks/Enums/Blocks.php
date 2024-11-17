<?php

namespace App\Cms\Blocks\Enums;

use App\Cms\Blocks\Common\CallToAction;
use App\Cms\Blocks\Common\Image;
use App\Cms\Blocks\Common\Map;
use App\Cms\Blocks\Common\Paragraph;

enum Blocks: string
{
    case CALL_TO_ACTION = CallToAction::class;
    case IMAGE = Image::class;
    case MAP = Map::class;
    case PARAGRAPH = Paragraph::class;
}
