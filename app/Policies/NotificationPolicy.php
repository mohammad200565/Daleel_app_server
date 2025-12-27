<?php

namespace App\Policies;

use App\Models\EditedRent;
use App\Models\User;

class NotificationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->verification_state == "verified";
    }
    public function restore(User $user, EditedRent $edited_rent): bool
    {
        return false;
    }
    public function forceDelete(User $user, EditedRent $edited_rent): bool
    {
        return false;
    }
}
