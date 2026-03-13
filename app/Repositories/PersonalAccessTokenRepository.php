<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PersonalAccessTokenRepository
{
    public function deleteByTokenableIdAndTokenId(int $tokenableId, int $tokenId): void
    {
        DB::table('personal_access_tokens')
            ->where('tokenable_id', $tokenableId)
            ->where('id', $tokenId)
            ->delete();
    }
}
