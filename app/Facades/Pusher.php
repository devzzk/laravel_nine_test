<?php

namespace App\Facades;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getSettings()
 * @method static array build_auth_query_params(string $auth_key, string $auth_secret, string $request_method, string $request_path, array $query_params = [], string $auth_version = '1.0', string $auth_timestamp = null)
 * @method static string array_implode(string $glue, string $separator, $array)
 * @method static object trigger($channels, string $event, $data, array $params = [], bool $already_encoded = false)
 * @method static PromiseInterface triggerAsync($channels, string $event, $data, array $params = [], bool $already_encoded = false)
 * @method static object sendToUser(string $user_id, string $event, $data, bool $already_encoded = false)
 * @method static PromiseInterface sendToUserAsync(string $user_id, string $event, $data, bool $already_encoded = false)
 * @method static object triggerBatch(array $batch = [], bool $already_encoded = false)
 * @method static PromiseInterface triggerBatchAsync(array $batch = [], bool $already_encoded = false)
 * @method static object terminateUserConnections(string $user_id)
 * @method static PromiseInterface terminateUserConnectionsAsync(string $user_id)
 * @method static object getChannelInfo(string $channel, array $params = [])
 * @method static object getChannels(array $params = [])
 * @method static object getPresenceUsers(string $channel)
 * @method static string authorizeChannel(string $channel, string $socket_id, string $custom_data = null)
 * @method static string authorizePresenceChannel(string $channel, string $socket_id, string $user_id, $user_info = null)
 */
class Pusher extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pusher';
    }
}
