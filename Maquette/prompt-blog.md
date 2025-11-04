{"variant":"standard","title":"Claude Prompt – 3-Page Blog with Tailwind CSS","id":"95245"}
Create a **3-page blog website** for the project **“Errachidia – Sahara Solidaire”** focusing on the question:  
**"Comment connecter et rendre visibles les initiatives rurales et solidaires du Tafilalet ?"**

### 🎯 Goal

Show how the platform helps connect and make visible rural and solidarity initiatives in the Tafilalet region.

---

### 📘 Context – Use Case Summary

Actors:

- Visitor (Guest)
- Initiator (Youssef / Association)
- Registered User (Amal)
- Admin (Platform Administrator)

Use Cases:

- View Articles
- Publish Update / Article
- Comment / Like / Share
- Search / Filter by Category
- Manage Content / Moderate
- Accueil (Liste)
- Détail article
- Favoris

Relationships:

- Visitors: view home (UC1) and article detail (UC2)
- Registered users: comment, search, and manage favorites (UC3)
- Admins and Initiators: publish and moderate

---

### 🧩 Project Requirements

Generate **three HTML pages** using **Tailwind CSS**:

1. **Accueil (index.html)**

   - Header with logo/title: _Errachidia – Sahara Solidaire_
   - Article list section (cards with `rounded-lg shadow gap-4`)
   - Each card includes a title, short description, category, and “Lire plus” link → links to _Détail article_ page
   - Add simple navigation links to “Favoris” and “Accueil”

2. **Détail article (detail.html)**

   - Full article view (title, image, content, category)
   - Section for comments (text area + “Publier” button)
   - Button “Ajouter aux favoris” → links to _Favoris_ page
   - Responsive layout using `flex`, `gap-4`, `rounded-lg`, and `shadow`

3. **Favoris (favoris.html)**
   - Displays cards of favorited articles
   - Each card includes article title + “Supprimer des favoris” button
   - Simple header and footer for consistency

---

### 🎨 Design Rules (Tailwind CSS)

- Use **flex**, **gap-4**, **rounded-lg**, and **shadow** classes
- Neutral and warm color palette to represent desert and solidarity (e.g., sand, beige, orange, brown tones)
- Responsive layout
- Minimalist typography and spacing

---

### ⚙️ Output Format

- Output three full HTML pages: `index.html`, `detail.html`, and `favoris.html`
- Use Tailwind CDN
- Each file should include:
  - Semantic HTML structure (header, main, footer)
  - Sample static text and placeholders (no dynamic logic)
  - Internal navigation links between pages

---

### ✅ Objective

Produce clean, realistic HTML prototypes ready for integration into the Errachidia – Sahara Solidaire platform based on the use cases.
