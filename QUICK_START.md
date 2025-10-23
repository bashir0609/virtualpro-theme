# Quick Start Guide

## 🚀 Get Your Theme on GitHub in 5 Minutes

### Step 1: Create GitHub Repository (2 min)
1. Go to https://github.com/new
2. Name: `islah-web-service-theme`
3. Make it **Public**
4. Click **Create repository**

### Step 2: Update Configuration (1 min)

**File: `theme/functions.php` (line ~235)**
```php
$github_username = 'your-github-username';  // ← Your username
$github_repo     = 'islah-web-service-theme';  // ← Your repo name
```

**File: `theme/style-source.css` (line 3)**
```css
Theme URI: https://github.com/your-username/islah-web-service-theme
Author: Your Name
```

### Step 3: Push to GitHub (1 min)

Run in terminal:
```bash
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
git push -u origin main
```

### Step 4: Create Release (1 min)
1. Go to your repo → **Releases** → **Create a new release**
2. Tag: `v1.0.0`
3. Title: `Version 1.0.0`
4. Click **Publish release**

### Step 5: Install on WordPress
1. Download release ZIP from GitHub
2. WordPress Admin → **Appearance** → **Themes** → **Add New** → **Upload Theme**
3. Upload ZIP and activate

## ✅ Done!

Your theme will now check for updates automatically every 12 hours.

## 📝 Making Updates

When you want to release an update:

```bash
# Make changes, then:
git add .
git commit -m 'Your changes'
git push

# Create new release on GitHub with version v1.0.1, v1.1.0, etc.
```

WordPress will show an update notification automatically!

## 📚 Need More Help?

- See `SETUP_GUIDE.md` for detailed instructions
- See `README.md` for full documentation
