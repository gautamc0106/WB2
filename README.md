# SCHOLARLY – Scholarship Application Portal

A complete, responsive web application for an online scholarship application/registration form, built with **HTML5, CSS3, JavaScript, jQuery, and PHP**. Developed as a Web Technology laboratory assignment.

> ⚠️ **Academic Demonstration Only** — This is a college lab project. It does not represent a real scholarship provider, applications are not submitted to any institution, and no personal data is stored in a database.

## Project Structure

```
scholarly-scholarship-portal/
├── index.html          # Home page
├── apply.html          # Scholarship application form
├── about.html          # About page
├── contact.html        # Contact page
├── success.php         # PHP processing & success page
├── style.css           # Stylesheet (navy, white, purple theme)
├── script.js           # Vanilla JS + jQuery form validation
├── README.md           # This file
└── .gitignore          # Git ignore rules
```

## Features

- Premium academic UI with navy blue, white, and purple accents
- Fully responsive layout (mobile, tablet, desktop)
- Navigation: Home, Apply Now, About, Contact
- Application form with:
  - Personal Information
  - Academic Information
  - Scholarship Information
  - Terms & Conditions checkbox
- Client-side validation using HTML5, Vanilla JavaScript, and jQuery:
  - Required field validation
  - Email format validation
  - 10-digit mobile number validation
  - Friendly inline error messages
- Server-side processing with PHP (`POST`)
- Server-side re-validation and sanitization using `htmlspecialchars`
- Success page with application details card layout
- Auto-generated application reference number
- Print Application button (JavaScript `window.print()`)
- Back to Home button
- No database storage (demo project)

## Technologies

- HTML5
- CSS3 (CSS Grid, Flexbox, responsive media queries)
- JavaScript (Vanilla)
- jQuery 3.7.1 (via CDN)
- PHP

## Local Setup

1. **Install a PHP server stack** such as XAMPP, WAMP, MAMP, or Laragon.
2. Place the `scholarly-scholarship-portal` folder inside your web server's document root (e.g., `htdocs` for XAMPP).
3. Start Apache (and PHP) from the control panel.
4. Open your browser and navigate to:

   ```
   http://localhost/scholarly-scholarship-portal/index.html
   ```

5. Click **Apply Now**, fill out the form, and submit to see the success page.

> Note: `success.php` requires a PHP interpreter to run. Opening it directly as a file (`file://`) will show raw PHP code.

## Cloud Deployment (PHP-compatible hosting)

This project can be deployed on any cloud platform that supports PHP, such as:

- **000webhost** (free PHP hosting)
- **InfinityFree** (free PHP hosting)
- **Heroku** (with a PHP buildpack)
- **Render** (PHP support)
- **Aiven / DigitalOcean / AWS / Azure** (PHP-enabled VMs or App Platform)

General deployment steps:

1. Upload all files (except `.git` and `node_modules`) to your PHP-compatible host's public directory.
2. Ensure `success.php` has execute/read permissions for the web server.
3. Confirm the `jquery-3.7.1.min.js` CDN link is reachable (internet access required).
4. Visit your domain's `index.html` and test the application form.

## Testing Checklist

- [ ] Navigation links work on all pages
- [ ] Form loads with all sections (Personal, Academic, Scholarship, Declaration)
- [ ] Valid submission redirects to `success.php` and displays data
- [ ] Invalid email shows an error message
- [ ] Non-10-digit mobile number shows an error message
- [ ] Empty required fields are blocked with inline errors
- [ ] Terms checkbox must be checked to submit
- [ ] Success page displays applicant, academic, and scholarship details
- [ ] Application reference number is generated
- [ ] Print button opens the browser print dialog
- [ ] Back to Home button returns to `index.html`
- [ ] Pages render correctly on mobile and desktop

## Git

This folder is a standalone Git repository. Do not push to GitHub unless explicitly requested.

```
git init
git add .
git commit -m "Initial commit: SCHOLARLY Scholarship Application Portal"
```

## License

MIT License – for academic demonstration purposes.