<?php

namespace App\Models;

use Illuminate\Support\Str;

trait ProviderGameable
{
    /**
     * Get attributes that should be visible to admin users only
     *
     * @return string[]
     */
    public function getVisibleOnlyToAdmins(): array
    {
        return ['data'];
    }

    /**
     * Getter for title attribute
     *
     * @return string
     */
    public function getTitleAttribute(): string
    {
        return $this->name;
    }

    /**
     * Getter for provider_name attribute
     *
     * @return string
     */
    public function getProviderNameAttribute(): string
    {
        return config(sprintf('game-providers.providers.%s.name', Str::of($this->table)->replace('games_', '')));
    }
}
