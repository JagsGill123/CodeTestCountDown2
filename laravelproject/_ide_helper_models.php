<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * Class CountDown
 * @mixin \Eloquent
 * @package App
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $url
 * @property \Illuminate\Support\Carbon $startDate
 * @property \Illuminate\Support\Carbon $endDate
 * @property int $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CountDown whereUrl($value)
 */
	class CountDown extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

