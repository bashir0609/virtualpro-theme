# VirtualPro - WordPress Theme for Virtual Assistants

A professional WordPress theme for virtual assistants and admin support services. Built with TailwindCSS and featuring automatic GitHub updates.

## Features

- **TailwindCSS** - Utility-first CSS framework
- **Automatic Updates** - Get update notifications directly in WordPress admin
- **GitHub Integration** - Version control and release management
- **Modern Development** - Hot reload, PostCSS, and esbuild
- **Accessibility Ready** - Built with best practices

## GitHub Setup (Required for Auto-Updates)

### Step 1: Create GitHub Repository

1. Go to [GitHub](https://github.com) and create a new repository
2. Name it something like `virtualpro-web-service-theme` or `virtualpro_tw`
3. Make it **Public** (or Private if you add an access token)
4. **Don't** initialize with README (we already have one)

### Step 2: Configure Theme Settings

1. Open `theme/functions.php`
2. Find the `virtualpro_init_updater()` function (around line 233)
3. Replace these values:
   ```php
   $github_username = 'YOUR_GITHUB_USERNAME';  // Your GitHub username
   $github_repo     = 'YOUR_REPO_NAME';        // Your repository name
   ```

4. Open `theme/style-source.css`
5. Update the Theme URI with your GitHub repository URL
6. Update the Author name and Author URI

### Step 3: Push to GitHub

Run these commands in your theme directory:

```bash
git add .
git commit -m "Initial commit: Islah Web Service Theme"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
git push -u origin main
```

### Step 4: Create Your First Release

1. Go to your GitHub repository
2. Click on **Releases** → **Create a new release**
3. Click **Choose a tag** → Type `v1.0.0` → Click **Create new tag**
4. Set **Release title**: `Version 1.0.0`
5. Add release notes describing your theme
6. Click **Publish release**

### Step 5: Future Updates

When you make changes and want to push an update:

```bash
# Make your changes, then:
git add .
git commit -m "Description of changes"
git push

# Create a new release on GitHub with a higher version number (e.g., v1.0.1, v1.1.0)
```

Your WordPress site will automatically check for updates and show a notification in the admin panel!

## Quickstart

### Installation

1. Move this folder to `wp-content/themes` in your local development environment
2. Run `npm install && npm run dev` in this folder
3. Activate this theme in your local WordPress installation

Using WordPress Multisite? Don’t forget that your theme must first be enabled via the Network Admin in order to be available for activation on a network site.

### Development

4. Run `npm run watch`
5. Add [Tailwind utility classes](https://tailwindcss.com/docs/utility-first) with abandon

### Deployment

6. Run `npm run bundle`
7. Upload the resulting zip file to your site using the “Upload Theme” button on the “Add Themes” administration page

Or [deploy with the tool of your choice](https://underscoretw.com/docs/deployment/#h-other-deployment-options)!

## Full Documentation

### Fundamentals

* [Installation](https://underscoretw.com/docs/installation/)  
  Generate your custom theme, install it in WordPress and run your first Tailwind builds
* [Development](https://underscoretw.com/docs/development/)  
  Watch for changes, build for production and learn more about how _tw, WordPress and Tailwind work together
* [Deployment](https://underscoretw.com/docs/deployment/)  
  Share your new WordPress theme with the world
* [Troubleshooting](https://underscoretw.com/docs/troubleshooting/)  
  Find solutions to potential issues and answers to frequently asked questions

### In Depth

* [Using Tailwind Typography](https://underscoretw.com/docs/tailwind-typography/)  
  Customize front-end and back-end typographic styles
* [JavaScript Bundling with esbuild](https://underscoretw.com/docs/esbuild/)  
  Install and bundle JavaScript libraries (very quickly)
* [Adding custom fonts](https://underscoretw.com/docs/custom-fonts/)
  Host your fonts yourself or use a third party—and then add those fonts to your WordPress theme
* [Linting and Code Formatting](https://underscoretw.com/docs/linting-code-formatting/)  
  Catch bugs and stop thinking about formatting
* [Keeping your theme up-to-date](https://underscoretw.com/docs/updating/)
  How to update (and whether or not you should)

### Extras

* [On Tailwind and WordPress](https://underscoretw.com/docs/wordpress-tailwind/)  
  Understand how WordPress and Tailwind work together
* [Styling HTML from outside the theme](https://underscoretw.com/docs/styling-html-from-outside-the-theme/)
  Work with WordPress core, plugins and JavaScript libraries
* [Managing Styles for Custom Blocks](https://underscoretw.com/docs/custom-blocks/)  
  Learn strategies for using Tailwind in theme-specific custom blocks
* [Setting Up Browsersync](https://underscoretw.com/docs/browsersync/)  
  Add live reloads and synchronized cross-device testing to your workflow
