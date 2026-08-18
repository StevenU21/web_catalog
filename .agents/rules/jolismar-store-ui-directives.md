---
trigger: always_on
---

# Jolismar Store: UI/UX Architecture & Design System Directives (V2.0)

## 1. Operational Philosophy & Cognitive Mitigation
The interface of Jolismar Store is not a decorative canvas; it is an unforgiving funnel of decisions structured for conversion. Every design choice must submit to the absolute mitigation of cognitive overload. When the user confronts the catalog, they operate under **Hick's Law**, which warns us that every additional option and stimulus paralyzes the decision-making time. Therefore, navigation shall be strictly categorized and binary; the user must never guess their next step.

To guide this decision, we will apply the **Isolation Effect (Von Restorff)** relentlessly: purchasing Calls to Action (CTAs) must be the sole elements that break the chromatic monotony, seizing all visual weight within the viewport. Furthermore, we recognize the danger of the **Halo Effect**, where a "beautiful" interface masks broken flows; we outright prohibit the use of template aesthetics that provide beauty without operational utility. As the classic Antoine de Saint-Exupéry decreed: *"Perfection is achieved, not when there is nothing more to add, but when there is nothing left to take away."* Our interface will achieve perfection through its void, not its ornaments.

## 2. Spatial Geometry & Tactile Architecture
Blank space is data, not an absence. The human brain demands the grouping of information to process it, a mechanism described by the **Law of Proximity (Gestalt)**. If a price floats at the same distance from two different products, the system has failed. Every margin and padding must obey a rigid mathematical scale (multiples of 4 or 8 pixels). Arbitrary spaces do not exist.

In the mobile ecosystem, the thumb is the sovereign architect. We subject every interactive component to **Fitts's Law**, dictating that the ease of reaching a target depends on its size and distance. By decree, no interactive element shall have a touch target smaller than 44x44 pixels. Faceted search and filters will not be unreachable sidebars, but rather Bottom Sheets that emerge within the user's ergonomic comfort zone.

## 3. Chromatic Tokens & Typographic Hierarchy
Colors are state variables and typography is data delimitation. We reject the **Aesthetic-Usability Effect**; we will not sacrifice legibility at the altar of minimalism. Text contrast against the background must exceed the WCAG 2.1 AA standard at all times.

*   `--color-bg-base`: `#F7F5F8` (Dawn Grey — Prevents the visual fatigue of pure white).
*   `--color-primary-cta`: `#A388A9` (Solid Lavender — Exclusive use for conversion triggers: "Checkout", "Add to Cart").
*   `--color-secondary-accent`: `#DAB6C4` (Mineral Rose — Discount tags, secondary metadata).
*   `--color-text-high-contrast`: `#8C6A5D` (Copper Earth — Product titles, typographic logos. Serif font: `Playfair Display` or `Lora` to project authority).
*   `--color-text-body`: `#2C2C2C` (Dark Grey — High data density, ingredients, pricing. Sans-serif font: `Inter` or `Roboto` for maximum legibility).

## 4. The Anatomy of Failure (Interaction & States)
Trust is forged in failure, not in success. The memory the user will retain of the store is governed by the **Peak-End Rule**, which states that we judge an experience by its most intense moment and how it ends. If the Checkout process throws a cryptic error, the entire preceding premium experience crumbles.

*   **The frontend lies:** The interface must provide immediate visual feedback (optimistic UI), but it must be designed assuming the client is a hostile environment. All forms must dispatch strictly typed payloads, relying entirely on the backend's validation barrier.
*   **Error Management:** A validation error is not red text. It is an interface state that must explain the resolution cleanly and aseptically.
*   **Doherty Threshold:** The system must respond in under 400ms to keep the user in a state of flow. Asynchronous and waiting states must utilize structured Skeletons; the screen must never freeze in white nor suffer from abrupt Cumulative Layout Shifts (CLS).

## 5. Architectural Constraints (UI Engineering)
When generating views, components, or interacting with the ecosystem (Vue/Inertia, Blade, React), the code must submit to this structural rigor:

1.  **Open/Closed Principle (OCP) in UI:** Base components (`ProductCard`, `Button`, `Modal`) must be open for extension (via *slots* or *children*) but completely closed for internal modification. A visual component must never contain the business logic to mutate a cart.
2.  **Abolition of "God Objects":** No view shall be a monolith. Decouple relentlessly. One component manages the UI state, an injected service handles the API call. Clean controllers, thin visual components.
3.  **DTO Contract & High Concurrency:** UI components must only consume and emit clean Data Transfer Objects (DTOs). The architecture assumes a high-concurrency environment; the visual state of a purchase button must lock or mutate instantly upon interaction to prevent duplicate requests.
4.  **YAGNI (You Aren't Gonna Need It):** It is strictly forbidden to program speculative animations, generic modals, or micro-interactions that do not solve a present conversion problem. Write the code needed today, not the one you imagine for next year.
