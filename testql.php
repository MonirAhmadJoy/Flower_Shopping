<?php
// Make an HTTP request to the GraphQL server
$url = 'http://localhost:4000/graphql';
$query = '{
  getUsers {
    user_id
    name
  }
}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'query=' . urlencode($query));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Handle the response
$data = json_decode($response, true);
$users = $data['data']['getUsers'];

// Output the user data in a table
echo '<table>';
echo '<tr><th>User ID</th><th>Name</th></tr>';
foreach ($users as $user) {
    echo '<tr><td>' . $user['user_id'] . '</td><td>' . $user['name'] . '</td></tr>';
}
echo '</table>';
?>
