<?php
// SCHOLARLY – Scholarship Application Portal
// Success page: displays sanitized submitted data.
// Academic demonstration only — no data is stored in a database.

$reference = 'SC-' . strtoupper(uniqid());

function sanitize($value) {
    if (is_array($value)) {
        return array_map('sanitize', $value);
    }
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$submitted = [
    'full_name'     => sanitize($_POST['full_name']     ?? ''),
    'dob'           => sanitize($_POST['dob']           ?? ''),
    'gender'        => sanitize($_POST['gender']        ?? ''),
    'email'         => sanitize($_POST['email']         ?? ''),
    'mobile'        => sanitize($_POST['mobile']        ?? ''),
    'city'          => sanitize($_POST['city']          ?? ''),
    'state'         => sanitize($_POST['state']         ?? ''),
    'college'       => sanitize($_POST['college']       ?? ''),
    'university'    => sanitize($_POST['university']    ?? ''),
    'course'        => sanitize($_POST['course']        ?? ''),
    'year'          => sanitize($_POST['year']          ?? ''),
    'percentage'    => sanitize($_POST['percentage']    ?? ''),
    'cgpa'          => sanitize($_POST['cgpa']          ?? ''),
    'category'      => sanitize($_POST['category']      ?? ''),
    'income'        => sanitize($_POST['income']        ?? ''),
    'why'           => sanitize($_POST['why']           ?? ''),
    'terms'         => !empty($_POST['terms']) ? 'Accepted' : 'Not Accepted',
];

$required = ['full_name', 'dob', 'gender', 'email', 'mobile', 'city', 'state',
             'college', 'university', 'course', 'year', 'percentage', 'cgpa',
             'category', 'income', 'why'];
$missing = [];
foreach ($required as $field) {
    if (trim($submitted[$field]) === '') {
        $missing[] = $field;
    }
}

if (empty($_POST['terms'])) {
    $missing[] = 'terms';
}

if (!empty($missing)) {
    http_response_code(400);
    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Validation Error</title></head><body>';
    echo '<h2>Incomplete Application</h2>';
    echo '<p>The following required fields are missing: ' . htmlspecialchars(implode(', ', $missing)) . '</p>';
    echo '<p><a href="apply.html" style="text-decoration:underline;">Return to Application Form</a></p>';
    echo '</body></html>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Successful – SCHOLARLY</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<nav class="navbar">
<div class="logo">SCHOLARLY<span>.</span></div>
<ul class="nav-links">
<li><a href="index.html">Home</a></li>
<li><a href="apply.html">Apply Now</a></li>
<li><a href="about.html">About</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</nav>
</header>

<section>
<div class="success-container">
<div class="success-header">
<div class="success-badge">✔ Application Received</div>
<h1>Application Submitted Successfully!</h1>
<p>Thank you, <?= $submitted['full_name'] ?>, for applying through SCHOLARLY.</p>
</div>

<div class="success-card">
<h3>Applicant Details</h3>
<div class="detail-row">
<div class="detail-item"><strong>Name</strong><span><?= $submitted['full_name'] ?></span></div>
<div class="detail-item"><strong>Date of Birth</strong><span><?= $submitted['dob'] ?></span></div>
<div class="detail-item"><strong>Gender</strong><span><?= $submitted['gender'] ?></span></div>
<div class="detail-item"><strong>Email</strong><span><?= $submitted['email'] ?></span></div>
<div class="detail-item"><strong>Mobile</strong><span><?= $submitted['mobile'] ?></span></div>
<div class="detail-item"><strong>City</strong><span><?= $submitted['city'] ?></span></div>
<div class="detail-item"><strong>State</strong><span><?= $submitted['state'] ?></span></div>
</div>
</div>

<div class="success-card">
<h3>Academic Information</h3>
<div class="detail-row">
<div class="detail-item"><strong>College</strong><span><?= $submitted['college'] ?></span></div>
<div class="detail-item"><strong>University</strong><span><?= $submitted['university'] ?></span></div>
<div class="detail-item"><strong>Course</strong><span><?= $submitted['course'] ?></span></div>
<div class="detail-item"><strong>Year of Study</strong><span><?= $submitted['year'] ?></span></div>
<div class="detail-item"><strong>Percentage</strong><span><?= $submitted['percentage'] ?>%</span></div>
<div class="detail-item"><strong>CGPA</strong><span><?= $submitted['cgpa'] ?></span></div>
</div>
</div>

<div class="success-card">
<h3>Scholarship Information</h3>
<div class="detail-row">
<div class="detail-item"><strong>Category</strong><span><?= $submitted['category'] ?></span></div>
<div class="detail-item"><strong>Family Income</strong><span><?= $submitted['income'] ?></span></div>
<div class="detail-item" style="flex:1 1 100%;"><strong>Statement</strong><span><?= nl2br($submitted['why']) ?></span></div>
<div class="detail-item"><strong>Terms</strong><span><?= $submitted['terms'] ?></span></div>
</div>
</div>

<div class="success-card">
<h3>Application Reference</h3>
<div class="detail-row">
<div class="detail-item" style="flex:1 1 100%;"><strong>Reference Number</strong><span class="reference-number"><?= $reference ?></span></div>
</div>
<p style="font-size:0.875rem;color:var(--slate);margin-top:1rem;">Please save this reference number for future correspondence.</p>
</div>

<div class="action-group">
<button class="btn-print" onclick="window.print()">Print Application</button>
<a href="index.html" class="btn btn-outline">Back to Home</a>
</div>
</div>
</section>

<footer>
<div class="container">
<p>&copy; 2026 SCHOLARLY – Scholarship Application Portal. Academic Demonstration Project.</p>
<p>This is a demo — no data is stored or submitted to any real institution.</p>
</div>
</footer>

</body>
</html>