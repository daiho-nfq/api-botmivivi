<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractJsonResource extends JsonResource
{
    /**
     * Resources that can be included if requested.
     */
    protected array $availableIncludes = [];

    protected function getIncludeParameter()
    {
        return array_merge(
            $this->availableIncludes,
            $this->extractIncludeParameter()
        );
    }

    protected function hasIncludeParameter(string $key, array $includeParams = []): bool
    {
        return in_array($key, $includeParams);
    }

    private function extractIncludeParameter()
    {
        $value = request()->query->get('include');

        return is_string($value) ? explode(',', $value) : [];
    }
}
