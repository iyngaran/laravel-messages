<?php
Route::resource('messages', 'MessageController');
Route::get('messages/all-messages/{id}', 'MessageController@getAllMessages');
