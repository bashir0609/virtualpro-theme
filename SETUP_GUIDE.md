# Setup Guide: GitHub Auto-Updates for WordPress Theme

This guide will help you set up automatic update notifications for your WordPress theme using GitHub releases.

## Prerequisites

- GitHub account
- Git installed on your computer
- WordPress website where you'll install the theme

## Quick Setup Checklist

- [ ] Create GitHub repository
- [ ] Update theme configuration files
- [ ] Push code to GitHub
- [ ] Create first release
- [ ] Install theme on WordPress
- [ ] Test update notification

## Detailed Instructions

### 1. Create GitHub Repository

1. Go to https://github.com/new
2. Repository name: `virtualpro-web-service-theme` (or your preferred name)
3. Description: "Custom WordPress theme with TailwindCSS"
4. Choose **Public** (required for free auto-updates)
5. **Do NOT** check "Add a README file"
6. Click **Create repository**

### 2. Update Configuration Files

#### A. Update `theme/functions.php`

Find line ~233 and update:

```php
function virtualpro_tw_init_updater() {
    $github_username = 'your-github-username';  // ← Change this
    $github_repo     = 'virtualpro-web-service-theme';  // ← Change this
    $theme_slug      = 'virtualpro_tw';  // Keep as is
    $access_token    = '';  // Leave empty for public repos
    
    new Islah_TW_Theme_Updater(
        $github_username,
        $github_repo,
        $theme_slug,
        $access_token
    );
}
```

#### B. Update `theme/style-source.css`

Update these lines:

```css
Theme Name: Islah Web Service Theme
Theme URI: https://github.com/your-username/virtualpro-web-service-theme
Author: Your Name
Author URI: https://github.com/your-username
Version: 1.0.0
```

### 3. Push to GitHub

Open terminal/command prompt in your theme folder and run:

```bash
# Initialize git (already done if you see .git folder)
git init

# Add all files
git add .

# Create first commit
git commit -m "Initial commit: Islah Web Service Theme v1.0.0"

# Rename branch to main
git branch -M main

# Add remote (replace with your repository URL)
git remote add origin https://github.com/your-username/virtualpro-web-service-theme.git

# Push to GitHub
git push -u origin main
```

### 4. Create Your First Release

1. Go to your GitHub repository page
2. Click **Releases** (right sidebar)
3. Click **Create a new release**
4. In "Choose a tag" field, type: `v1.0.0`
5. Click **Create new tag: v1.0.0 on publish**
6. Release title: `Version 1.0.0`
7. Description (example):
   ```
   ## Initial Release
   
   - Custom WordPress theme with TailwindCSS
   - Automatic update notifications from GitHub
   - Modern development workflow
   - Responsive design
   ```
8. Click **Publish release**

### 5. Install Theme on WordPress

#### Option A: Upload ZIP (Recommended)

1. On GitHub release page, click **Source code (zip)** to download
2. In WordPress admin: **Appearance** → **Themes** → **Add New** → **Upload Theme**
3. Choose the downloaded ZIP file
4. Click **Install Now**
5. Click **Activate**

#### Option B: Manual Installation

1. Download/copy the theme folder
2. Upload to `wp-content/themes/` on your server
3. In WordPress admin: **Appearance** → **Themes**
4. Find "Islah Web Service Theme" and click **Activate**

### 6. Test Update System

To test if updates work:

1. Make a small change to your theme (e.g., edit README.md)
2. Commit and push:
   ```bash
   git add .
   git commit -m "Test update"
   git push
   ```
3. Create a new release on GitHub with version `v1.0.1`
4. Wait 12 hours OR force check by going to WordPress admin → **Dashboard** → **Updates**
5. You should see an update notification for your theme!

## How Updates Work

1. **Every 12 hours**, WordPress checks GitHub for new releases
2. If a **newer version** is found, an update notification appears
3. Click **Update Now** to install the new version
4. WordPress downloads the latest release ZIP from GitHub
5. Theme is automatically updated

## Version Numbering

Follow semantic versioning:

- **Major** (1.0.0 → 2.0.0): Breaking changes
- **Minor** (1.0.0 → 1.1.0): New features
- **Patch** (1.0.0 → 1.0.1): Bug fixes

Always use `v` prefix in tags: `v1.0.0`, `v1.0.1`, etc.

## Troubleshooting

### Update not showing?

1. Check version in `theme/style-source.css` matches your latest release
2. Rebuild CSS: `npm run dev`
3. Clear WordPress transients: **Tools** → **Site Health** → **Info** → **Database** → Clear transients
4. Wait 12 hours or manually check: **Dashboard** → **Updates**

### Private Repository?

If your repository is private, you need a GitHub Personal Access Token:

1. GitHub → **Settings** → **Developer settings** → **Personal access tokens** → **Tokens (classic)**
2. Click **Generate new token (classic)**
3. Select scope: `repo` (Full control of private repositories)
4. Copy the token
5. In `theme/functions.php`, add token:
   ```php
   $access_token = 'ghp_your_token_here';
   ```

### Permission Errors?

Make sure your WordPress installation has write permissions to the themes folder.

## Best Practices

1. **Always test locally** before pushing to GitHub
2. **Create meaningful release notes** for each version
3. **Use semantic versioning** consistently
4. **Backup your site** before updating themes
5. **Test updates on staging** before production

## Support

For issues with:
- **Theme functionality**: Check theme files and WordPress error logs
- **GitHub integration**: Verify repository settings and release tags
- **Update mechanism**: Check `theme/inc/theme-updater.php`

## Additional Resources

- [GitHub Releases Documentation](https://docs.github.com/en/repositories/releasing-projects-on-github)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Semantic Versioning](https://semver.org/)
