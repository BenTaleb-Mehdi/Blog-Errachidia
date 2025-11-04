{"variant":"standard","title":"Claude Prompt – Blog Admin Part","id":"95262"}
Extend the existing **“Errachidia – Sahara Solidaire” blog** (public pages: Accueil, Détail article, Favoris) to include a full **Admin section** with Tailwind CSS.  

---

### 🎯 Goal
Allow the **Admin / Initiator** to:
- Publish new articles  
- Edit or delete existing articles  
- Moderate comments  
- Manage categories and favorites  

Maintain consistency with the public pages in design and layout.

---

### 🧩 Admin Section Requirements

1. **Admin Dashboard (admin.html)**
   - Header with platform title and admin navigation
   - Sections using cards (`rounded-lg shadow gap-4`) for:
     - **Articles Management**: list of all articles with Edit / Delete buttons
     - **Comments Moderation**: list comments with Approve / Delete buttons
     - **Categories Management**: add, edit, delete categories
   - Responsive layout using `flex` and `gap-4`

2. **Publish / Edit Article Page (admin-publish.html)**
   - Form to add or edit article:
     - Title, Image URL, Content, Category
     - Buttons: “Publier” / “Enregistrer les modifications”
   - Use Tailwind classes for form: `flex flex-col gap-4 rounded-lg shadow p-6`
   - Link back to Admin Dashboard

3. **Moderate Comments Page (admin-comments.html)**
   - List all comments with user name, article title, comment text
   - Approve / Delete buttons per comment
   - Use `flex`, `gap-4`, `rounded-lg`, `shadow` for cards

---

### 🎨 Design Rules
- Maintain Tailwind CSS consistency with public pages
- Use `flex`, `gap-4`, `rounded-lg`, `shadow` for cards and sections
- Neutral/warm color palette, clean typography
- Responsive design

---

### ⚙️ Output
- Generate **HTML prototypes** for:
  1. `admin.html` (dashboard)
  2. `admin-publish.html` (publish/edit article)
  3. `admin-comments.html` (moderate comments)
- Include **internal navigation links** between admin pages and public pages
- Use **Tailwind CDN**
- Include **sample placeholders** for articles, comments, and categories  

---

### ✅ Objective
Produce a fully structured **admin section** for the Errachidia – Sahara Solidaire blog that integrates with the public pages, ready for styling and future backend integration.
