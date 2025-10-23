# 🔄 Update Workflow Diagram

## How Automatic Updates Work

```
┌─────────────────────────────────────────────────────────────────┐
│                     YOUR DEVELOPMENT WORKFLOW                    │
└─────────────────────────────────────────────────────────────────┘

1. Make Changes to Theme
   ↓
2. Test Locally
   ↓
3. Commit Changes
   $ git add .
   $ git commit -m "Add new feature"
   ↓
4. Push to GitHub
   $ git push
   ↓
5. Create GitHub Release
   - Go to GitHub → Releases
   - Create new release
   - Tag: v1.0.1 (increment version)
   - Publish

┌─────────────────────────────────────────────────────────────────┐
│                  WORDPRESS AUTO-UPDATE PROCESS                   │
└─────────────────────────────────────────────────────────────────┘

Every 12 Hours:
   ↓
WordPress Checks GitHub API
   ↓
Compares Current Version vs Latest Release
   ↓
If New Version Available:
   ↓
Shows Update Notification in Admin Panel
   ↓
User Clicks "Update Now"
   ↓
WordPress Downloads Latest Release ZIP
   ↓
Installs & Activates New Version
   ↓
✅ Theme Updated!
```

## Version Numbering Guide

```
v1.0.0
 │ │ │
 │ │ └─── PATCH: Bug fixes (1.0.0 → 1.0.1)
 │ └───── MINOR: New features (1.0.0 → 1.1.0)
 └─────── MAJOR: Breaking changes (1.0.0 → 2.0.0)
```

## Example Update Scenarios

### Scenario 1: Bug Fix
```bash
# Fix a bug in your theme
git add .
git commit -m "Fix header alignment issue"
git push

# Create release v1.0.1 on GitHub
```
**Result**: Users see "Version 1.0.1 available" in WordPress

### Scenario 2: New Feature
```bash
# Add a new widget
git add .
git commit -m "Add custom footer widget"
git push

# Create release v1.1.0 on GitHub
```
**Result**: Users see "Version 1.1.0 available" in WordPress

### Scenario 3: Major Update
```bash
# Redesign entire theme
git add .
git commit -m "Complete theme redesign"
git push

# Create release v2.0.0 on GitHub
```
**Result**: Users see "Version 2.0.0 available" in WordPress

## Update Check Timing

```
WordPress Site
   ↓
Checks GitHub every 12 hours
   ↓
Cache stored as transient
   ↓
Manual check: Dashboard → Updates
```

## File Structure

```
islah_tw/
├── theme/
│   ├── functions.php           ← Updater initialization
│   ├── style-source.css        ← Version number here
│   └── inc/
│       └── theme-updater.php   ← Update checker logic
├── README.md                   ← Documentation
├── SETUP_GUIDE.md             ← Detailed setup
├── QUICK_START.md             ← Quick reference
└── .git/                      ← Git repository
```

## Key Configuration Points

### 1. GitHub Settings (functions.php)
```php
$github_username = 'your-username';  // ← Your GitHub username
$github_repo     = 'your-repo';      // ← Repository name
```

### 2. Version Number (style-source.css)
```css
Version: 1.0.0  // ← Must match GitHub release tag (without 'v')
```

### 3. GitHub Release Tag
```
Tag: v1.0.0     // ← Must have 'v' prefix
```

## Troubleshooting Flow

```
Update Not Showing?
   ↓
Check 1: Is version in style-source.css correct?
   ↓ No → Update version number
   ↓ Yes
   ↓
Check 2: Did you create GitHub release?
   ↓ No → Create release with proper tag
   ↓ Yes
   ↓
Check 3: Is GitHub username/repo correct in functions.php?
   ↓ No → Update configuration
   ↓ Yes
   ↓
Check 4: Wait 12 hours or clear WordPress transients
   ↓
Check 5: Manually check: Dashboard → Updates
```

## Security Notes

- ✅ Public repos: No token needed
- 🔐 Private repos: Requires GitHub Personal Access Token
- 🔒 Token stored in functions.php (keep secure)
- 🚫 Never commit tokens to public repositories

## Best Practices

1. **Always test locally** before pushing
2. **Use semantic versioning** consistently
3. **Write clear release notes** for users
4. **Backup before updating** (for users)
5. **Test on staging site** before production

## Quick Commands Reference

```bash
# Check current status
git status

# Add all changes
git add .

# Commit changes
git commit -m "Your message"

# Push to GitHub
git push

# View commit history
git log --oneline

# Check remote URL
git remote -v
```

## Support Checklist

Before asking for help, verify:
- [ ] GitHub repository is public (or token is set for private)
- [ ] GitHub username and repo name are correct in functions.php
- [ ] Version number in style-source.css matches reality
- [ ] GitHub release tag follows v1.0.0 format
- [ ] At least one release exists on GitHub
- [ ] WordPress has internet access to GitHub API

---

**Ready to update?** Follow the workflow above and your users will get automatic notifications!
