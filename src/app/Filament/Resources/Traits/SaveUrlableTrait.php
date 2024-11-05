<?php

namespace App\Filament\Resources\Traits;

use App\Models\Interface\UrlableContract;
use App\Models\Urlable;
use Illuminate\Database\Eloquent\Model;

trait SaveUrlableTrait
{
    protected function saveUrlable(Model $record, $data): void
    {
        if (! empty($data['content'])) {
            foreach ($data['content'] as $block) {
                if ($block['type'] === 'callToAction' && isset($block['data'])) {
                    $callToActionData = $block['data'];

                    if (! empty($callToActionData['urlable_id'])) {
                        [$type, $id] = explode(':', $callToActionData['urlable_id']);
                        $modelClass = collect(config('urlable.models'))
                            ->first(fn ($class) => $class === $type);
                        $instance = $modelClass::find($id);

                        if ($instance instanceof UrlableContract) {
                            Urlable::updateOrCreate(
                                [
                                    'linkable_type' => $modelClass,
                                    'linkable_id' => $id,
                                    'uri' => $instance->uri()
                                ],
                                [
                                    'uri' => $instance->uri(),
                                ]
                            );
                        }
                    }
                }
            }
        }
    }
}
