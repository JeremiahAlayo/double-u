<?php
declare(strict_types=1);

const PROGRAM_NAME = 'Doubleyou Africa Internship Program 2026';
const CONTACT_EMAIL = 'hello@doubleyou.com.ng';

function clean_value(string $value): string
{
    $value = trim($value);
    $value = preg_replace('/[\x00-\x1F\x7F]/u', ' ', $value) ?? $value;
    return preg_replace('/\s+/u', ' ', $value) ?? $value;
}

function render_response(string $title, string $message, bool $isError = false): void
{
    $statusClass = $isError ? 'form-status error' : 'form-status success';
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

    http_response_code($isError ? 422 : 200);
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{$safeTitle} | Doubleyou Africa Internship Program 2026</title>
    <meta name="robots" content="noindex" />
    <link rel="icon" type="image/jpeg" href="assets/doubleyou-logo-official.jpg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body class="registration-body">
    <main class="registration-main response-main">
      <section class="registration-form-section">
        <div class="container form-shell response-shell">
          <img class="response-logo" src="assets/doubleyou-logo-official.jpg" alt="Doubleyou Logo" />
          <div class="{$statusClass}">
            <h1>{$safeTitle}</h1>
            <p>{$safeMessage}</p>
          </div>
          <div class="form-actions">
            <a class="button button-primary" href="register.html">Back to Form</a>
            <a class="button button-secondary" href="index.html">Program Page</a>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>
HTML;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    render_response('Open the application form', 'Please complete the registration form before submitting.', true);
}

if (!empty($_POST['website'] ?? '')) {
    render_response('Application received', 'Thank you. Your application has been received.');
}

$allowedTracks = [
    'Software Development',
    'Creative Studio: Animation and Design',
    'Community Growth',
    'Marketing and Communications',
];

$fields = [
    'full_name' => 'Full name',
    'email' => 'Email address',
    'phone' => 'Phone / WhatsApp number',
    'country' => 'Country',
    'institution' => 'University / institution',
    'course' => 'Course / department',
    'level' => 'Level / year of study',
    'preferred_track' => 'Preferred track',
    'reason' => 'Reason for applying',
    'skills' => 'Relevant skills',
];

$data = [];
foreach ($fields as $key => $label) {
    $value = clean_value((string)($_POST[$key] ?? ''));
    if ($value === '') {
        render_response('Missing information', "Please provide: {$label}.", true);
    }
    $data[$key] = $value;
}

$data['portfolio_link'] = clean_value((string)($_POST['portfolio_link'] ?? ''));
$data['availability'] = isset($_POST['availability']) ? 'Yes' : '';

if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    render_response('Check your email address', 'Please enter a valid email address and submit again.', true);
}

if (!in_array($data['preferred_track'], $allowedTracks, true)) {
    render_response('Choose a valid track', 'Please select one of the official internship tracks.', true);
}

if ($data['portfolio_link'] !== '' && !filter_var($data['portfolio_link'], FILTER_VALIDATE_URL)) {
    render_response('Check your portfolio link', 'Please enter a valid portfolio or profile link, or leave the field empty.', true);
}

if ($data['availability'] !== 'Yes') {
    render_response('Confirm availability', 'Please confirm that you can participate remotely for the 16-week program.', true);
}

$submissionDir = __DIR__ . DIRECTORY_SEPARATOR . 'submissions';
if (!is_dir($submissionDir) && !mkdir($submissionDir, 0755, true)) {
    render_response('Submission error', 'We could not save your application right now. Please try again later.', true);
}

$htaccessPath = $submissionDir . DIRECTORY_SEPARATOR . '.htaccess';
if (!file_exists($htaccessPath)) {
    file_put_contents($htaccessPath, "Require all denied\nOrder allow,deny\nDeny from all\n");
}

$csvPath = $submissionDir . DIRECTORY_SEPARATOR . 'applications.csv';
$isNewFile = !file_exists($csvPath);
$handle = fopen($csvPath, 'ab');
if ($handle === false) {
    render_response('Submission error', 'We could not save your application right now. Please try again later.', true);
}

if ($isNewFile) {
    fputcsv($handle, [
        'submitted_at',
        'full_name',
        'email',
        'phone',
        'country',
        'institution',
        'course',
        'level',
        'preferred_track',
        'reason',
        'skills',
        'portfolio_link',
        'availability',
        'ip_address',
    ]);
}

fputcsv($handle, [
    gmdate('Y-m-d H:i:s') . ' UTC',
    $data['full_name'],
    $data['email'],
    $data['phone'],
    $data['country'],
    $data['institution'],
    $data['course'],
    $data['level'],
    $data['preferred_track'],
    $data['reason'],
    $data['skills'],
    $data['portfolio_link'],
    $data['availability'],
    $_SERVER['REMOTE_ADDR'] ?? '',
]);
fclose($handle);

$subject = PROGRAM_NAME . ' - New Application';
$body = "A new internship application has been submitted.\n\n"
    . "Name: {$data['full_name']}\n"
    . "Email: {$data['email']}\n"
    . "Phone: {$data['phone']}\n"
    . "Country: {$data['country']}\n"
    . "Institution: {$data['institution']}\n"
    . "Track: {$data['preferred_track']}\n";
$headers = 'From: no-reply@doubleyou.org.ng' . "\r\n" . 'Reply-To: ' . $data['email'];
@mail(CONTACT_EMAIL, $subject, $body, $headers);

render_response('Application received', 'Thank you for applying. Doubleyou will review your details and contact shortlisted applicants by email or WhatsApp.');

