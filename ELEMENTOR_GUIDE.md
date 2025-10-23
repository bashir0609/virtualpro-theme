# 🎨 Elementor Header & Footer Guide

## ✨ VirtualPro now supports Elementor for custom headers and footers!

You can now design your header and footer visually using Elementor's drag-and-drop builder.

---

## 📋 Prerequisites

1. **Install Elementor** (Free or Pro)
   - Go to **Plugins** → **Add New**
   - Search for "Elementor"
   - Install and activate

2. **Activate VirtualPro Theme**
   - Make sure the theme is active

---

## 🚀 Quick Start

### Method 1: Using Custom Post Type (Recommended)

#### Step 1: Create Header Template

1. Go to **Header & Footer** → **Add New Template**
2. Give it a name (e.g., "My Custom Header")
3. In the **Template Type** box (right sidebar), select **Header**
4. Click **Publish**
5. Click **Edit with Elementor**
6. Design your header using Elementor widgets
7. Click **Update** when done

#### Step 2: Create Footer Template

1. Go to **Header & Footer** → **Add New Template**
2. Give it a name (e.g., "My Custom Footer")
3. In the **Template Type** box (right sidebar), select **Footer**
4. Click **Publish**
5. Click **Edit with Elementor**
6. Design your footer using Elementor widgets
7. Click **Update** when done

**That's it!** Your Elementor header and footer will automatically replace the default ones.

---

### Method 2: Using Elementor Theme Builder (Elementor Pro Only)

If you have **Elementor Pro**:

1. Go to **Templates** → **Theme Builder**
2. Click **Add New** → **Header**
3. Design your header
4. Set display conditions (e.g., "Entire Site")
5. Publish

Repeat for Footer.

---

## 🎯 How It Works

### Priority System

VirtualPro checks for headers/footers in this order:

1. **Elementor Theme Builder** (Pro) - Highest priority
2. **Custom Header/Footer Templates** (Custom Post Type)
3. **Default Theme Header/Footer** - Fallback

### Switching Between Designs

**To use Elementor header/footer:**
- Create a template as described above

**To use default theme header/footer:**
- Delete or trash your Elementor templates
- The theme will automatically fall back to the default design

---

## 💡 Design Tips

### Header Design Ideas

**Essential Elements:**
- Logo (use Image widget)
- Navigation Menu (Nav Menu widget - Pro, or custom links)
- CTA Button (Button widget)
- Search bar (optional)
- Contact info (optional)

**Recommended Sections:**
```
┌─────────────────────────────────────────┐
│ Logo    Menu Items    [CTA Button]      │
└─────────────────────────────────────────┘
```

**Sticky Header:**
- In Elementor, select the section
- Go to **Advanced** → **Motion Effects**
- Enable **Sticky** → **Top**

### Footer Design Ideas

**Common Layout:**
```
┌──────────────────────────────────────────┐
│  About Us  │  Quick Links  │  Contact   │
│            │               │            │
│  Logo      │  - Home       │  Email     │
│  Text      │  - Services   │  Phone     │
│            │  - About      │  Address   │
├──────────────────────────────────────────┤
│  © 2025 Your Company | Privacy | Terms  │
└──────────────────────────────────────────┘
```

**Widgets to Use:**
- Heading
- Text Editor
- Icon List
- Social Icons
- Divider
- Spacer

---

## 🔧 Customization Options

### Making Header Sticky

1. Select your header section in Elementor
2. Go to **Advanced** tab
3. **Motion Effects** → **Sticky** → **Top**
4. Adjust offset if needed

### Full-Width Header/Footer

1. Select the section
2. **Layout** → **Content Width** → **Full Width**
3. **Column Gap** → **No Gap** (if needed)

### Mobile Responsive

Elementor automatically handles mobile responsiveness, but you can customize:

1. Click the responsive mode icon (bottom left)
2. Switch between Desktop/Tablet/Mobile
3. Adjust settings for each device

---

## 📱 Mobile Menu

### Option 1: Elementor Pro Nav Menu Widget

If you have Elementor Pro:
- Add **Nav Menu** widget
- It includes built-in mobile hamburger menu
- Fully customizable

### Option 2: Custom Mobile Menu

Without Pro:
- Create a separate mobile menu section
- Use **Hide On Desktop** (Advanced → Responsive)
- Add buttons/links manually
- Style as needed

---

## 🎨 Styling Tips

### Match Your Brand

**Colors:**
- Use consistent brand colors
- Set in Elementor → Site Settings → Global Colors

**Fonts:**
- Set global fonts in Site Settings
- Use max 2-3 font families

**Spacing:**
- Use consistent padding/margins
- Typical header height: 80-100px
- Footer padding: 60-80px top/bottom

### Professional Look

**Header:**
- Clean, minimal design
- Clear navigation
- Prominent CTA
- Sticky on scroll

**Footer:**
- Dark background (e.g., #1a1a1a)
- Light text (e.g., #ffffff)
- Organized columns
- Social media icons

---

## 🔄 Switching Back to Default

### Temporarily Disable Elementor Header/Footer

**Option 1: Trash Templates**
- Go to **Header & Footer**
- Move your templates to Trash
- Default header/footer will show

**Option 2: Unpublish Templates**
- Edit the template
- Change status to **Draft**
- Update

### Permanently Use Default

- Delete Elementor header/footer templates
- The theme's default design will be used

---

## 🛠️ Troubleshooting

### Header/Footer Not Showing

**Check:**
1. Is Elementor installed and active?
2. Is the template published (not draft)?
3. Is the template type set correctly (Header or Footer)?
4. Clear cache (if using caching plugin)

### Elementor Editor Not Loading

**Solutions:**
1. Check if Elementor is active
2. Update Elementor to latest version
3. Disable other plugins temporarily
4. Check for JavaScript errors (F12 → Console)

### Styling Issues

**Common Fixes:**
1. Set section to **Full Width**
2. Remove default padding/margins
3. Check z-index for sticky headers
4. Clear browser cache

---

## 📦 What's Included

**New Features Added:**

✅ **Custom Post Type:** "Header & Footer" for templates
✅ **Template Type Selector:** Choose Header or Footer
✅ **Elementor Integration:** Full Elementor support
✅ **Theme Builder Support:** Works with Elementor Pro
✅ **Automatic Fallback:** Uses default if no Elementor template
✅ **Admin Notices:** Helpful instructions in admin

**Files Added:**
- `theme/inc/elementor-support.php` - Elementor integration
- Updated `theme/header.php` - Checks for Elementor header
- Updated `theme/footer.php` - Checks for Elementor footer
- Updated `theme/functions.php` - Includes Elementor support

---

## 🎯 Best Practices

### Performance

1. **Optimize Images:** Use WebP format, compress images
2. **Minimize Widgets:** Don't overuse heavy widgets
3. **Use Caching:** Install a caching plugin
4. **Lazy Load:** Enable lazy loading for images

### SEO

1. **Proper Headings:** Use H1 for logo on homepage only
2. **Alt Text:** Add alt text to all images
3. **Semantic HTML:** Use proper HTML structure
4. **Mobile-First:** Ensure mobile responsiveness

### Accessibility

1. **Color Contrast:** Ensure readable text
2. **Keyboard Navigation:** Test with Tab key
3. **ARIA Labels:** Add labels to buttons/links
4. **Focus States:** Visible focus indicators

---

## 🚀 Example Workflow

### Creating a Professional Header

1. **Create Template**
   - Header & Footer → Add New
   - Name: "Main Header"
   - Type: Header
   - Publish

2. **Design Structure**
   - Add Section (1 column)
   - Set to Full Width
   - Add Inner Section (3 columns: Logo | Menu | CTA)

3. **Add Elements**
   - Column 1: Image widget (logo)
   - Column 2: Nav Menu or custom links
   - Column 3: Button widget (CTA)

4. **Style It**
   - Background: White
   - Padding: 20px top/bottom
   - Make sticky (Motion Effects)

5. **Mobile Optimization**
   - Switch to mobile view
   - Adjust column widths
   - Hide/show elements as needed

6. **Publish**
   - Click Update
   - View your site!

---

## 📚 Resources

**Elementor Documentation:**
- [Elementor Basics](https://elementor.com/help/)
- [Theme Builder](https://elementor.com/help/theme-builder/)
- [Header Templates](https://elementor.com/help/header-footer/)

**VirtualPro Theme:**
- Default header: `theme/template-parts/layout/header-content.php`
- Default footer: `theme/template-parts/layout/footer-content.php`
- Elementor support: `theme/inc/elementor-support.php`

---

## ✨ Summary

**With Elementor Support:**
- ✅ Design headers/footers visually
- ✅ No coding required
- ✅ Full customization control
- ✅ Mobile responsive
- ✅ Easy to update
- ✅ Professional results

**Without Elementor:**
- ✅ Beautiful default header/footer included
- ✅ Professional design
- ✅ Mobile responsive
- ✅ Ready to use

**Choose what works best for you!** 🎉

---

**Need help?** Check the troubleshooting section or refer to Elementor's documentation.
