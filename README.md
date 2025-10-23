# VirtualPro - WordPress Theme for Virtual Assistants

A professional WordPress theme for virtual assistants and admin support services. Built with TailwindCSS and featuring automatic GitHub updates.

## Features

- **TailwindCSS** - Utility-first CSS framework
- **Automatic Updates** - Get update notifications directly in WordPress admin
- **GitHub Integration** - Version control and release management
- **Modern Development** - Hot reload, PostCSS, and esbuild
- **Accessibility Ready** - Built with best practices
- **Elementor Support** - Design headers and footers visually (optional)

## 🚀 Installation

### Quick Install (Recommended)

1. Go to [Releases](https://github.com/bashir0609/virtualpro-theme/releases)
2. Download the latest release ZIP file
3. In WordPress Admin: **Appearance** → **Themes** → **Add New** → **Upload Theme**
4. Choose the downloaded ZIP file
5. Click **Install Now** and then **Activate**

### Manual Installation

1. Clone or download this repository
2. Upload the `virtualpro` folder to `wp-content/themes/` on your WordPress site
3. In WordPress Admin: **Appearance** → **Themes**
4. Find **VirtualPro** and click **Activate**

## 🔄 Automatic Updates

This theme includes automatic update notifications from GitHub!

**How it works:**
- WordPress checks for new releases every 12 hours
- When a new version is available, you'll see an update notification
- Click "Update Now" to install the latest version
- No manual downloads needed!

### Creating Updates (For Developers)

When you want to release an update

1. Make your changes and commit them:
   ```bash
   git add .
   git commit -m "Description of changes"
   git push
   ```

2. Create a new release on GitHub:
   - Go to [Create Release](https://github.com/bashir0609/virtualpro-theme/releases/new)
   - Tag: `v1.0.1` (or next version number)
   - Title: `VirtualPro v1.0.1`
   - Add release notes
   - Click **Publish release**

3. WordPress sites using this theme will automatically see the update notification!

## 💻 Development

### Local Development Setup

1. Clone this repository to `wp-content/themes/` in your local WordPress installation
2. Navigate to the theme directory
3. Install dependencies:
   ```bash
   npm install
   ```
4. Start development mode:
   ```bash
   npm run dev
   ```
5. Activate the theme in WordPress Admin

**WordPress Multisite:** Enable the theme via Network Admin before activating on individual sites.

### Development Commands

- **`npm run watch`** - Watch for changes and rebuild automatically
- **`npm run dev`** - Build for development
- **`npm run bundle`** - Create production-ready ZIP file

### Building for Production

```bash
npm run bundle
```

This creates a `virtualpro.zip` file ready for deployment.

## 🎨 Customization

VirtualPro uses TailwindCSS for styling. You can customize:

- **Colors & Fonts**: Edit `tailwind/tailwind-theme.css`
- **Typography**: Modify `VIRTUALPRO_TYPOGRAPHY_CLASSES` in `theme/functions.php`
- **Templates**: Edit files in `theme/template-parts/`

## 🎯 Elementor Header & Footer Builder

VirtualPro includes full Elementor support for designing custom headers and footers!

### With Elementor (Visual Design)

1. Install the free **Elementor** plugin
2. Go to **Header & Footer** → **Add New Template**
3. Select **Header** or **Footer** type
4. Click **Edit with Elementor**
5. Design visually with drag & drop
6. Publish!

### Without Elementor (Code/Customize)

Use the beautiful default header and footer designs included with the theme. No setup required!

**Features:**
- ✅ Professional, modern design
- ✅ Mobile responsive
- ✅ Sticky header option
- ✅ Social media integration
- ✅ CTA buttons
- ✅ Easy to customize

**Learn more:** See `ELEMENTOR_GUIDE.md` for detailed instructions.

## 📋 Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- Node.js (for development)

## 🔗 Links

- **Repository**: https://github.com/bashir0609/virtualpro-theme
- **Releases**: https://github.com/bashir0609/virtualpro-theme/releases
- **Issues**: https://github.com/bashir0609/virtualpro-theme/issues

## 📚 Additional Documentation

For more detailed guides, check these files in the repository:

- **QUICK_START.md** - 5-minute setup guide
- **SETUP_GUIDE.md** - Detailed configuration instructions
- **UPDATE_WORKFLOW.md** - How the update system works
- **ELEMENTOR_GUIDE.md** - Elementor header/footer builder
- **DEPLOY_NOW.md** - Deployment checklist
- **WORDPRESS_INSTALL.md** - WordPress installation guide
- **THEME_NAME_FIX.md** - Theme naming issues

### TailwindCSS Resources

This theme is built on [Underscores + Tailwind (_tw)](https://underscoretw.com/):

- [Tailwind Documentation](https://tailwindcss.com/docs)
- [Tailwind Typography](https://underscoretw.com/docs/tailwind-typography/)
- [JavaScript Bundling](https://underscoretw.com/docs/esbuild/)
- [Custom Fonts](https://underscoretw.com/docs/custom-fonts/)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This theme is licensed under the GPL v2 or later.

## 👤 Author

**Bashir**
- GitHub: [@bashir0609](https://github.com/bashir0609)
- Repository: [virtualpro-theme](https://github.com/bashir0609/virtualpro-theme)

---

**Built with ❤️ for Virtual Assistants and Admin Support Professionals**
