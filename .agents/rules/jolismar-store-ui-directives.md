---
trigger: always_on
---

# Jolismar Store: UI/UX Architecture & Design System Directives

## 1. Core Philosophy & Cognitive Principles
This document serves as the single source of truth for engineering UI interfaces across the Jolismar Store platform. The primary objective is the absolute mitigation of **Cognitive Overload**. Every UI decision must strictly submit to operational efficiency and data legibility.

* **Hick's Law:** Minimize user decision time. Navigation must be strictly categorized (Skincare, Makeup, Fragrances) or binary.
* **Isolation Effect (Von Restorff):** Calls to Action (CTAs) must remain the sole element carrying primary visual weight on any given viewport.
* **Halo Effect:** Clean UI architecture, precise spacing, and zero visual friction must project operational reliability. Zero tolerance for generic template aesthetics.

---

## 2. Color Tokens & Theme
Colors are state variables and hierarchical markers—not decorative elements. Pure white backgrounds are prohibited for base surfaces to prevent visual fatigue.

* `--color-bg-base`: `#F7F5F8` (Dawn Grey — Main backgrounds and base surfaces).
* `--color-primary-cta`: `#A388A9` (Solid Lavender — Reserved exclusively for conversion triggers: "Add to Cart", "Checkout").
* `--color-secondary-accent`: `#DAB6C4` (Mineral Rose — Discount tags, "New" badges, secondary metadata).
* `--color-text-high-contrast`: `#8C6A5D` (Copper Earth — Primary headings, brand accents, typographic logo).
* `--color-text-body`: `#2C2C2C` (Dark Grey — Body descriptions, ingredient lists, high-density data).

---

## 3. Typographic Architecture
Implement a dual-font system to enforce a strict visual boundary between branding and data consumption.

* **Primary Font Family (Branding & Headings):** `Playfair Display`, `Lora`, or an equivalent high-contrast serif.
  * *Usage:* Product titles, H1/H2 headings, top-bar typographic wordmark.
  * *Intent:* Project authority, tradition, and premium cosmetic craftsmanship.
* **Secondary Font Family (UI & Data):** `Inter`, `Roboto`, or an equivalent neutral sans-serif.
  * *Usage:* Pricing, CTAs, ingredient specifications, form controls, navigation menus.
  * *Intent:* Maximum legibility across high-density layouts.

---

## 4. UI Component Directives

### 4.1. Product Cards
* **Strict Hierarchy:** Product Image > Price > Primary CTA > Product Title.
* **Surfaces:** Product assets must feature transparent or neutral cutouts blending into `--color-bg-base`.
* **Zero Noise:** No decorative badges, distracting watermarks, or non-essential overlays obscuring the product asset.

### 4.2. Header & Navigation
* **Minimalism:** The brand header must remain purely typographic ("Jolismar Store" in primary serif). Omit complex logomarks, phone numbers, or social media icons from the top bar.
* **Faceted Search:** Catalog views must feature immediate filter mechanisms (Brand, Skin Type, Price).

### 4.3. Forms & Inputs (Interaction Architecture)
* **Strict Validation:** Inputs must provide immediate visual feedback. However, **the frontend lies**; design all form interfaces to dispatch strictly shaped payloads, expecting full backend validation barriers.
* **State Completeness:** All interactive controls must explicitly define `:hover`, `:focus`, and `:disabled` states (especially during asynchronous operations).

---

## 5. Architectural Constraints for Code Generation (Strict Rules)
When generating components or views (Blade, Vue/Inertia, React, or semantic HTML), adhere strictly to these engineering constraints:

1. **YAGNI (You Aren't Gonna Need It):** Never scaffold speculative modals, complex micro-interactions, or unnecessary components that do not serve the immediate conversion flow.
2. **Single Responsibility (Thin Components):** Each UI component must serve exactly one presentation purpose. Decouple presentation markup from data state management.
3. **No God Components:** Prevent monolithic views. Decompose into modular primitives: `ProductList`, `ProductCard`, `FilterSidebar`.
4. **Backend Integration Contract:** Assume high concurrency. Components consuming APIs must submit clean, structured payloads tailored for server-side DTO consumption, with explicit UI handling for loading, empty, and error states.
