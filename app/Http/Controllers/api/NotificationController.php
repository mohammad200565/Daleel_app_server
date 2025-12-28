<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;

class NotificationController extends BaseApiController
{
    public function index()
    {
        $this->authorize('viewAny', Notification::class);
        $user = request()->user();
        $notifications = $user->notifications()->paginate(15);
        return $this->successResponse(
            "Notifications fetched successfully",
            NotificationResource::collection($notifications)
        );
    }
}
