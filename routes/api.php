<?php
Route::resource('messages', 'MessageController');
Route::get('messages/all-messages/{id}', 'MessageController@getAllMessages');
Route::resource('replies', 'ReplyController');
Route::get('replies/all-replies/{id}', 'ReplyController@getAllReplies');
