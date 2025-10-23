# 📦 WordPress Installation Guide

## ⚠️ Important: GitHub ZIP vs WordPress ZIP

**Problem:** GitHub's source code ZIP won't work directly in WordPress because it has the wrong folder structure.

**Solution:** Use one of these methods:

---

## Method 1: Build Production ZIP (Recommended)

This creates a proper WordPress-ready ZIP file.

### Step 1: Build the ZIP
```bash
# Make sure you're in the theme directory
npm install  # Only needed once
npm run bundle
```

This creates `virtualpro.zip` in the root directory.

### Step 2: Upload to WordPress
1. Go to WordPress Admin → **Appearance** → **Themes** → **Add New**
2. Click **Upload Theme**
3. Choose `virtualpro.zip` from your theme directory
4. Click **Install Now**
5. Click **Activate**

✅ **This will work perfectly!**

---

## Method 2: Manual Installation (No Build Required)

If you don't want to build, manually install the theme folder.

### Step 1: Copy Theme Folder
1. Copy the entire `theme` folder from your repository
2. Rename it to `virtualpro`

### Step 2: Upload via FTP/File Manager
1. Connect to your WordPress site via FTP or cPanel File Manager
2. Navigate to `wp-content/themes/`
3. Upload the `virtualpro` folder
4. Go to WordPress Admin → **Appearance** → **Themes**
5. Find **VirtualPro** and click **Activate**

✅ **This also works!**

---

## Method 3: GitHub Release with Proper ZIP

For GitHub releases, we need to create a proper WordPress ZIP.

### Create WordPress-Ready Release

**Option A: Upload Built ZIP to Release**
1. Build locally: `npm run bundle`
2. Go to GitHub releases
3. Create release and **manually upload** `virtualpro.zip` as an asset
4. Users download this ZIP, not the source code

**Option B: Use GitHub Actions (Automated)**

Create `.github/workflows/release.yml`:

```yaml
name: Build Release
on:
  push:
    tags:
      - 'v*'

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      
      - name: Setup Node.js
        uses: actions/setup-node@v3
        with:
          node-version: '18'
      
      - name: Install dependencies
        run: npm install
      
      - name: Build theme
        run: npm run bundle
      
      - name: Create Release
        uses: softprops/action-gh-release@v1
        with:
          files: virtualpro.zip
        env:
          GITHUB_TOKEN: ${{ secrets.GITHUB_TOKEN }}
```

This automatically builds and attaches the proper ZIP when you push a tag!

---

## 🎯 Recommended Workflow

### For Development:
```bash
npm run dev      # Build for development
npm run watch    # Auto-rebuild on changes
```

### For Release:
```bash
npm run bundle   # Creates virtualpro.zip
```

Then either:
- **Upload ZIP to GitHub release** (manual)
- **Use GitHub Actions** (automatic)

---

## 📁 Folder Structure Explained

### GitHub Source Code ZIP (❌ Won't Work):
```
virtualpro-theme-main/
├── theme/
│   ├── style.css  ← WordPress looks here
│   └── ...
├── package.json
└── ...
```
WordPress expects `style.css` in root, but it's inside `theme/` folder.

### Proper WordPress ZIP (✅ Works):
```
virtualpro/
├── style.css  ← WordPress finds it!
├── functions.php
├── index.php
└── ...
```

The `npm run bundle` command:
1. Builds CSS and JS
2. Copies only the `theme/` folder contents
3. Renames it to `virtualpro/`
4. Creates `virtualpro.zip`

---

## 🔄 Update Your Release Process

### Current Process (Semi-Automatic):
```bash
# 1. Make changes and commit
git add .
git commit -m "Your changes"
git push

# 2. Build the ZIP
npm run bundle

# 3. Create tag
git tag -a v1.0.0 -m "Version 1.0.0"
git push origin v1.0.0

# 4. Create release on GitHub
# - Go to releases page
# - Create release from tag
# - Upload virtualpro.zip as an asset
# - Publish
```

### With GitHub Actions (Fully Automatic):
```bash
# 1. Make changes and commit
git add .
git commit -m "Your changes"
git push

# 2. Create and push tag
git tag -a v1.0.0 -m "Version 1.0.0"
git push origin v1.0.0

# 3. GitHub Actions automatically:
# - Builds the theme
# - Creates the release
# - Attaches virtualpro.zip
```

---

## 🚨 Quick Fix for Current Release

Since your v1.0.0 release has the wrong ZIP:

### Option 1: Add Proper ZIP to Existing Release
1. Build: `npm run bundle`
2. Go to: https://github.com/bashir0609/virtualpro-theme/releases/tag/v1.0.0
3. Click **Edit release**
4. Drag and drop `virtualpro.zip` to the assets section
5. Update release notes: "Download `virtualpro.zip` for WordPress installation"
6. Save

### Option 2: Create New Release
1. Delete v1.0.0 tag and release
2. Build: `npm run bundle`
3. Create new v1.0.0 release
4. Upload `virtualpro.zip`

---

## ✅ Testing Your ZIP

Before releasing, test the ZIP:

1. Build: `npm run bundle`
2. Extract `virtualpro.zip`
3. Check that `style.css` is in the root
4. Test install on local WordPress

---

## 💡 Pro Tip

Add this to your `.gitignore` (already there):
```
virtualpro.zip
```

This prevents committing the built ZIP file.

---

**Summary:** Always use `npm run bundle` to create the WordPress-installable ZIP, then upload it to your GitHub release!
