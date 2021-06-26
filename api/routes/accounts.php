<?php
/**
 * @OA\Info(title="My First API", version="0.1")
 */

/**
 * @OA\Get(
 *     path="/api/resource.json",
 *     @OA\Response(response="200", description="An example resource")
 * )
 */

Flight::route('GET /admin/accounts', function () {
    $offset = Flight::query('offset', 0);
    $limit = Flight::query('limit', 25);
    $search = Flight::query('search');
    $order = Flight::query('order', "-id");

    Flight::json(Flight::accountService()->get_accounts($search, $offset, $limit, $order));
});

Flight::route('GET /admin/accounts/@id', function ($id) {
    Flight::json(Flight::accountService()->get_by_id($id));
});

Flight::route('POST /admin/accounts', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::accountService()->add($data));
});

Flight::route('PUT /admin/accounts/@id', function ($id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::accountService()->update($id, $data));
});

Flight::route('GET /user/account', function () {
    Flight::json(Flight::accountService()->get_by_id(Flight::get('user')['aid']));
});

?>


?>