---
trigger: always_on
---

# Jolismar Store: Product Vision, Market Context & System Architecture

## 1. Project Overview & Business Identification
* **Entity Name:** Jolismar Store
* **Founding Year:** 2025
* **Operational Base:** Estelí, Nicaragua (National shipping coverage across Nicaragua).
* **Owner & Leadership:** Daysi Lisbeth Peralta Pastrana.
* **Core Economic Activity:** Commercialization of original skincare, makeup, and perfumes.
* **Current Operational Channels:** Facebook, Instagram, TikTok, and WhatsApp Business.
* **Project Objective:** Transition from fragmented social-media selling to a centralized, high-performance web catalog featuring an AI-driven natural language recommendation assistant connected via third-party APIs, routing finalized carts directly to WhatsApp Business for conversion.

---

## 2. Problem Statement & Market Opportunity

### 2.1. The Operational Bottleneck
In cosmetic and skincare e-commerce, customer buying intent depends heavily on pre-purchase advisory (e.g., skin compatibility, active ingredients, treatment routines). 
* **Failure Mode:** Manual 1-to-1 chat support (WhatsApp/Instagram DMs) collapses during peak hours.
* **Cognitive Impact:** The delay between inquiry and recommendation increases friction and triggers immediate drop-off / cart abandonment.

### 2.2. Value Proposition & Unfair Advantage
Unlike local competitors who rely on static PDF catalogs or slow manual responses, Jolismar Store integrates:
1. **Minimalist Web Catalog:** High data density, zero visual noise, sub-second load times.
2. **Natural Language AI Advisory Engine:** An integrated assistant that processes natural user queries (e.g., *"Tengo piel grasa con tendencia a acné y busco un limpiador suave"*) and maps them against real-time active inventory.
3. **Frictionless Handoff:** Instant compilation of selected products into structured payloads for direct checkout routing to WhatsApp Business.

---

## 3. Target Audience & Consumer Empathy Profile

* **Demographics:** Young adults and adults (men and women) across Nicaragua with access to digital payment/transfers and social media discovery (TikTok/Instagram).
* **Core Pain Points:** * Fear of purchasing counterfeit skincare products (authenticity anxiety).
  * Frustration with unassisted technical terminology (AHAs, BHAs, Retinoids, Niacinamide).
  * Fatigue caused by waiting hours for pricing and stock verification via DM.
* **Mental Model:** The user seeks fast, trustworthy, dermocosmetic-grade clarity and immediate confirmation of availability.

---

## 4. System Capabilities & Functional Scope

### 4.1. Catalog & Inventory Subsystem
* **Category Partitioning:** Strict tri-partition (`Skincare`, `Maquillaje`, `Perfumería`).
* **Attributes & Facets:** Dynamic filtering by Brand (e.g., *The Ordinary, L'Oréal, CeraVe*), Skin Type (`Grasa`, `Seca`, `Mixta`, `Sensible`), Concerns (`Acné`, `Manchas`, `Hidratación`), and Price Range (NIO / USD reference).
* **Stock & Pricing Transparency:** Real-time visibility of availability to prevent dead-end interactions.

### 4.2. Natural Language Recommendation Assistant (AI Integration)
* **Ingress:** Natural language search bar and interactive conversational module.
* **Processing:** Intent parsing and semantic extraction of skin type, budget, and desired outcome.
* **Egress:** Curated array of exact product matches currently in stock, with concise explanations of active ingredients.

### 4.3. Order Dispatch & WhatsApp Bridge
* **Cart Serialization:** Compilation of user selections into a standardized, clean text receipt.
* **Direct Deep Linking:** Auto-generation of WhatsApp API links (`https://wa.me/...`) pre-populated with customer intent, product IDs, quantities, and total estimate.

---

## 5. Architectural & Technical Constraints for Agents

When generating code, scaffolding features, or designing schemas for this project:

1. **Strict Input Validation & Security:**
   * Never trust client-side data. All payloads sent to AI endpoints or order formatters must be sanitized and validated server-side.
2. **Decoupled Architecture:**
   * Keep controllers lean. Isolate AI orchestration, catalog querying, and WhatsApp message formatting into dedicated **Action/Service classes** and **DTOs**.
3. **Resilience & Graceful Degradation:**
   * If external AI APIs throttle or fail, the catalog must seamlessly fall back to deterministic relational queries and faceted search without breaking user flow.
4. **Performance & High Concurrency:**
   * Optimize database queries (prevent N+1 on product categories/variants). Leverage eager loading, database indexing on filterable fields, and light, cache-friendly view models.
5. **YAGNI & Anti-Complexity Principle:**
   * Do not implement multi-tiered payment gateways or complex authentication systems unless explicitly scoped. The primary conversion path is Catalog/AI $\rightarrow$ WhatsApp checkout.