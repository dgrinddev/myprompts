# MyPrompts.io

MyPrompts is an AI prompt manager for storing, organizing, and accessing your prompts for ChatGPT, Midjourney, and other AI tools.

Live demo: [MyPrompts.io](https://myprompts.io/)

---

## Tech stack

Built on the TALL stack — Tailwind CSS, Alpine.js, Laravel, Livewire.

Hosted on **Laravel Cloud**.

---

## Architecture

### Layout

The layout uses three Blade layers: a master layout, app/guest/auth wrappers, and full-page Livewire components routed directly via Laravel. No starter kit was used — everything is built from scratch.

### Livewire components

All reactive UI — searching, form submission, live updates, and cross-component communication — is handled server-side without writing custom JavaScript.

### UI components

All UI components are built from scratch, inspired by PenguinUI's approach to Tailwind and Alpine.js — but understood, rebuilt, and adapted specifically for this project.

### Laravel features in use

**Observers** automatically generate a text excerpt from a prompt's content on save. **Policies** ensure users can only access their own data. **Localization** uses short keys throughout, making the entire UI translatable without touching view files. **Custom middleware** handles role-based access and prompt ownership at the route level.

### SEO & performance

Public pages have full meta tags (Open Graph, Twitter Card), Structured Data, canonical tags, and a sitemap. Fonts are local, images are WebP, video is served via BunnyCDN.
