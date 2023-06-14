<!DOCTYPE html>
<html>

<head>
  <title>GitHub Repositories</title>
  <style>
    .button-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .repo-button {
      margin-bottom: 10px;
      width: 300px;
      /* Set a fixed width for the buttons */
      background-color: #007bff;
      color: #fff;
      padding: 8px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-align: left;
    }

    .repo-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div style="text-align: center;">
    <h1>Here are your searched user's repository list</h1>
  </div> <?php
          $accessToken = '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';

          if (isset($_POST['github'])) {
            $githubUsername = $_POST['github'];

            $url = "https://api.github.com/users/" . $githubUsername . "/repos"; // Replace 'USERNAME' with the GitHub username for which you want to retrieve repositories.
          }

          $options = [
            'http' => [
              'header' => [
                'User-Agent: PHP',
                'Authorization: Bearer ' . $accessToken
              ]
            ]
          ];

          $context = stream_context_create($options);
          $response = file_get_contents($url, false, $context);

          if ($response !== false) {
            $repositories = json_decode($response, true);
            if (!empty($repositories)) {
              echo '<div class="button-container">';
              foreach ($repositories as $index => $repository) {
                $repoName = $repository['name'];
                $repoUrl = $repository['html_url'];
                echo '<a href="' . $repoUrl . '" target="_blank"><button class="repo-button">' . ($index + 1) . '. ' . $repoName . '</button></a>'; // Output the repository name as a button with index and link
              }
              echo '</div>';
            } else {
              echo '<p>No repositories found.</p>';
            }
          } else {
            echo '<p>Error: Unable to retrieve data from the GitHub API.</p>';
          }
          ?>
</body>

</html>