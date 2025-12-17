# Resume Portfolio Website

This is an online portfolio of my work. The online template has been adopted from KARDS and changes were made according to requirements.

## Setup Instructions

### Prerequisites
- PHP 8.5 or higher
- Composer

### Installation

1. **Install PHP dependencies:**
   ```bash
   composer install
   ```

2. **Configure Email (Optional):**
   If you want to use the contact form, you'll need to set up SparkPost:
   - Sign up for a SparkPost account at https://www.sparkpost.com
   - Get your API key from the SparkPost dashboard
   - Set environment variables:
     ```bash
     export SPARKPOST_API_KEY="your-api-key-here"
     export SPARKPOST_SANDBOX_DOMAIN="sparkpostbox.com"  # Optional, defaults to sparkpostbox.com
     ```
   - Update `$siteOwnersEmail` in `inc/sendEmail.php` with your email address

### Running Locally

Start the PHP development server:
```bash
php -S localhost:8000
```

Then open your browser and navigate to:
```
http://localhost:8000
```

The site will be available at `http://localhost:8000/index.html`

### Project Structure

- `index.html` - Main portfolio page
- `inc/sendEmail.php` - Contact form email handler (requires SparkPost API key)
- `css/` - Stylesheets
- `js/` - JavaScript files
- `images/` - Images and portfolio assets
- `vendor/` - PHP dependencies (managed by Composer)

### Notes

- The contact form requires SparkPost API credentials to function
- For development/testing, you can use SparkPost's sandbox mode
- The site works as a static site even without PHP/email functionality

## Deploying to GitHub Pages

This site can be hosted on GitHub Pages for free. Note that PHP functionality (contact form) will not work on GitHub Pages, but the rest of the site will function perfectly.

### Steps to Deploy:

1. **Create a GitHub repository:**
   - Go to https://github.com/new
   - Create a new repository (e.g., `resume-portfolio` or `uday-mudivarty-portfolio`)
   - **Do NOT** initialize with README, .gitignore, or license (we already have these)

2. **Push your code to GitHub:**
   ```bash
   git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
   git branch -M main
   git push -u origin main
   ```

3. **Enable GitHub Pages:**
   - Go to your repository on GitHub
   - Click on **Settings** → **Pages**
   - Under "Source", select **main** branch and **/ (root)** folder
   - Click **Save**
   - Your site will be available at: `https://YOUR_USERNAME.github.io/YOUR_REPO_NAME/`

4. **Custom Domain (Optional):**
   - If you have a custom domain (like `www.udaymudivarty.me`), you can configure it in the Pages settings
   - Add a `CNAME` file in the root with your domain name

### Important Notes for GitHub Pages:

- ✅ HTML, CSS, JavaScript work perfectly
- ✅ All images and assets will load correctly
- ❌ PHP contact form will NOT work (GitHub Pages only serves static files)
- 💡 Consider using a service like Formspree, Netlify Forms, or a JavaScript-based contact solution for GitHub Pages

### Alternative: Keep Contact Form Working

If you need the PHP contact form to work, consider:
- **Netlify** - Supports serverless functions
- **Vercel** - Supports serverless functions
- **Traditional web hosting** - Any PHP-enabled hosting service

