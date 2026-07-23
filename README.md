# Double U Projects

A clean GitHub Pages project hub for Double U initiatives, programs, and landing pages.

The first project under this hub is the AFRICAN STUDENT IMPACT PROGRAM page.

## Current pages

```text
/
  Double U project hub
/africa-internship-program-2026/
  AFRICAN STUDENT IMPACT PROGRAM landing page
/africa-internship-program-2026/register.html
  Embedded Google Form application page
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

The program landing page is:

```text
https://JeremiahAlayo.github.io/double-u/africa-internship-program-2026/
```

The embedded application page preview is:

```text
https://JeremiahAlayo.github.io/double-u/africa-internship-program-2026/register.html
```

## Official application form

All Apply and Apply Now buttons use the public Google Form `viewform` link:

```text
https://docs.google.com/forms/d/e/1FAIpQLSexspXmDF1F4tevz4qjRqpaMB-zgbJU-cqYG6qmxqa-KMVeWA/viewform
```

The embedded form page uses this public embed URL:

```text
https://docs.google.com/forms/d/e/1FAIpQLSexspXmDF1F4tevz4qjRqpaMB-zgbJU-cqYG6qmxqa-KMVeWA/viewform?embedded=true
```

Do not use or publish any Google Form edit link on the public website.

## What is included

- Double U root project hub
- AFRICAN STUDENT IMPACT PROGRAM landing page
- Embedded Google Form application page
- Program quick facts
- Four program track sections
- Eligibility section
- Benefits section
- Timeline section
- Trust badges
- FAQ section
- Apply Now calls to action linked to the public Google Form
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
  styles.css
  script.js
  assets/
    doubleyou-internship-flyer-optimized.jpg
    doubleyou-logo-official.jpg
```

## How responses are collected

Responses are collected directly inside Google Forms. Open the Google Form owner account to view responses, export to Google Sheets, or download CSV.

The website does not collect responses locally and does not use PHP, CSV storage, or a database.

## Hosting requirements

No Node.js, npm, database, or PHP form handler is required.

Required:

- Static hosting or cPanel File Manager upload
- The `africa-internship-program-2026/` folder uploaded as-is
- Public access to the Google Form `viewform` link

Recommended after upload:

1. Back up any existing `public_html/africa-internship-program-2026/` folder.
2. Upload or extract the new `africa-internship-program-2026/` folder into `public_html/`.
3. Open the landing page.
4. Click every Apply button and confirm it opens the public Google Form.
5. Open `register.html` and confirm the embedded Google Form loads.
6. Test desktop responsiveness.
7. Test mobile responsiveness.
8. Confirm the live page does not contain a Google Form edit link.

## Local preview

Open `index.html` directly in a browser for the hub.

Open `africa-internship-program-2026/index.html` directly in a browser for the program page.

Open `africa-internship-program-2026/register.html` directly in a browser for the embedded Google Form page.

No build step is required.

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