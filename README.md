# Double U Projects

A clean GitHub Pages project hub for Double U initiatives, programs, and landing pages.

The first project under this hub is the Doubleyou Africa Internship Program 2026 landing page.

## Current pages

```text
/
  Double U project hub
/africa-internship-program-2026/
  Doubleyou Africa Internship Program 2026 landing page
```

## GitHub Pages link structure

Use this repository name on GitHub:

```text
double-u
```

The main project hub will be:

```text
https://JeremiahAlayo.github.io/double-u/
```

The internship landing page will be:

```text
https://JeremiahAlayo.github.io/double-u/africa-internship-program-2026/
```

This keeps future Double U projects organized under one GitHub Pages site.

## What is included

- Double U root project hub
- Doubleyou Africa Internship Program 2026 landing page
- Program quick facts
- Four internship track sections
- Eligibility section
- Benefits section
- Timeline section
- Trust badges
- FAQ section
- Apply Now calls to action
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
africa-internship-program-2026/
  index.html
```

## Local preview

Open `index.html` directly in a browser for the hub.

Open `africa-internship-program-2026/index.html` directly in a browser for the internship page.

No build step is required.

## Application form link

Before launch, add the final form URL in `script.js`:

```js
const APPLICATION_FORM_URL = "https://your-application-form-link";
```

Until that is added, the Apply Now button in the final application section shows a warning note instead of opening a form.

## GitHub Pages setup

Because this is a static site, GitHub Pages can serve it directly from the repository root.

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

## Optional gh-pages branch pattern

Labari Blog documents a `gh-pages` branch pattern for generated static output. This project does not need that because it is already static. If you later convert this to Next.js or Vite, create a build output folder and publish that output to `gh-pages`.

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