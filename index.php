<?php 
  require_once('database.class.php');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $config = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'databasename' => 'database-class'
  ];

  $db = new Database($config);

  // $posts = $db->table('posts')
  //             ->limit(10)
  //             ->get();

  // foreach($posts as $post) {
  //   echo $post->Title .'<br />';
  // }

  // // Insert
  // $db->table('posts')
  //     ->insert([
  //       'title' => 'Bai viet 1',
  //       'content' => 'Noi dung bai viet 1'
  //     ]);

  // // Delete
  // $db->table('posts')->deleteId(6);

  $posts = $db->table('posts')
              ->updateRow(
                  7,
                  [
                    'title' => 'CodersX',
                    'content' => 'Chào mừng bạn đến với Coders X'
                  ] 
                );
?>