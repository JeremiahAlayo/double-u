# Double U Projects

A clean GitHub Pages project hub for Double U initiatives, programs, and landing pages.

The first project under this hub is the Doubleyou Africa Internship Program 2026 landing page.

## Current pages

```text
/
  Double U project hub
/africa-internship-program-2026/
  Doubleyou Africa Internship Program 2026 landing page
/africa-internship-program-2026/register.html
  Applicant registration form
```

## GitHub Pages link structure

Use this repository name on GitHub:

```text
double-u
```

The main project hub is:

```text
https://JeremiahAlayo.github.io/double-u/
```

The internship landing page is:

```text
https://JeremiahAlayo.github.io/double-u/africa-internship-program-2026/
```

The registration form preview is:

```text
https://JeremiahAlayo.github.io/double-u/africa-internship-program-2026/register.html
```

GitHub Pages is only a static preview. The PHP form submission works only after the folder is uploaded to a PHP-enabled host such as cPanel.

## What is included

- Double U root project hub
- Doubleyou Africa Internship Program 2026 landing page
- Applicant registration form
- PHP submission handler
- Protected submissions folder
- Program quick facts
- Four internship track sections
- Eligibility section
- Benefits section
- Timeline section
- Trust badges
- FAQ section
- Apply Now calls to action linked to the form
- SEO metadata and structured data
- Optimized flyer image for web loading

## Files

```text
index.html
styles.css
script.js
assets/
  doubleyou-internship-flyer.png
  doubleyou-internship-flyer-optimized.jpg
  doubleyou-logo-official.jpg
africa-internship-program-2026/
  index.html
  register.html
  submit.php
  styles.css
  script.js
  assets/
    doubleyou-internship-flyer-optimized.jpg
    doubleyou-logo-official.jpg
  submissions/
    .htaccess
    index.html
```

## How responses are collected

When the project is uploaded to cPanel, applicants submit the form at:

```text
https://doubleyou.com.ng/africa-internship-program-2026/register.html
```

The form posts to:

```text
https://doubleyou.com.ng/africa-internship-program-2026/submit.php
```

`submit.php` validates the form and saves every application into:

```text
public_html/africa-internship-program-2026/submissions/applications.csv
```

The CSV contains:

- Submission time
- Full name
- Email address
- Phone / WhatsApp number
- Country
- University / institution
- Course / department
- Level / year of study
- Preferred track
- Reason for applying
- Relevant skills
- Portfolio link
- Availability confirmation
- IP address

The `submissions` folder includes `.htaccess` rules to block public browser access. Download the CSV from cPanel File Manager instead of linking it publicly.

## Email notifications

The form sends a basic notification email to:

```text
hello@doubleyou.com.ng
```

To change the notification recipient, edit this line in `africa-internship-program-2026/submit.php`:

```php
const CONTACT_EMAIL = 'hello@doubleyou.com.ng';
```

The CSV file is the main reliable record. Email delivery depends on the cPanel server mail configuration, SPF, DKIM, and whether PHP `mail()` is enabled.

## cPanel requirements

No Node.js, npm, database, or build tool is required on the server.

Required:

- Apache or LiteSpeed hosting
- PHP 8 or later
- PHP file write permission inside `submissions/`
- PHP `mail()` enabled for notifications
- cPanel File Manager access for downloading `applications.csv`

Recommended after upload:

1. Back up any existing `public_html/africa-internship-program-2026/` folder.
2. Upload or extract the new `africa-internship-program-2026/` folder into `public_html/`.
3. Open the landing page.
4. Click every Apply button and confirm it opens `register.html`.
5. Submit one test application.
6. Confirm the success page appears.
7. Confirm `submissions/applications.csv` was created in cPanel.
8. Confirm a notification email arrives at the configured email address.
9. Delete the test application row from the CSV if needed.

## Local preview

Open `index.html` directly in a browser for the hub.

Open `africa-internship-program-2026/index.html` directly in a browser for the internship page.

Open `africa-internship-program-2026/register.html` directly in a browser for the form layout.

Local form submission requires PHP. This machine did not have PHP installed during testing, so final form submission should be tested on cPanel.

## GitHub Pages setup

Because this is a static site preview, GitHub Pages can serve it directly from the repository root.

Recommended setup:

1. Create a GitHub repository named `double-u`.
2. Push this local repo to GitHub.
3. Open the repo on GitHub.
4. Go to Settings > Pages.
5. Under Build and deployment, choose Deploy from a branch.
6. Select branch: `main`.
7. Select folder: `/root`.
8. Save.

## Suggested Git workflow

```bash
git remote add origin https://github.com/JeremiahAlayo/double-u.git
git push -u origin main
```

## Future project pattern

Add future Double U projects as folders:

```text
/new-project-name/index.html
/another-campaign/index.html
```

Each one will get a clean URL under:

```text
https://JeremiahAlayo.github.io/double-u/<project-folder>/
```
