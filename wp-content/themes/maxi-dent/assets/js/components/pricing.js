const initPricingTabs = () => {
  const wrapper = document.getElementById("pricing-wrapper");
  const tabsContainer = document.querySelector(".pricing-tabs");
  if (!tabsContainer || !wrapper) return;

  const tabs = [...tabsContainer.querySelectorAll(".pricing-tab")];

  // Number of items before collapsing
  const ITEMS_LIMIT = 5;

  // State
  const state = {
    active: 0,
    loading: false,
    runId: 0,
    cache: {},
  };

  const root = document.querySelector("[data-pricing-nonce]");
  const nonce = root?.dataset.pricingNonce || "";
  const postId = root?.dataset.pricingPost || "";
  const ajaxUrl = window?.themeParams?.ajaxUrl || "/wp-admin/admin-ajax.php";

  // --- Logic for Load More (Reset & Init) ---
  const initLoadMore = (container) => {
    const rows = container.querySelectorAll(".pricing-service-row");
    const btnWrapper = container.querySelector(".pricing-load-more-wrapper");
    const btn = container.querySelector(".pricing-load-more-btn");

    if (!rows.length || !btnWrapper || !btn) return;

    // If few items — hide button permanently
    if (rows.length <= ITEMS_LIMIT) {
      btnWrapper.style.display = "none";
      return;
    }
    for (let i = ITEMS_LIMIT; i < rows.length; i++) {
      rows[i].style.display = "none";
    }
    btnWrapper.style.display = "";

    // Clear old events via cloning
    const newBtn = btn.cloneNode(true);
    btn.parentNode.replaceChild(newBtn, btn);

    // Add expand event
    newBtn.addEventListener("click", (e) => {
      e.preventDefault();

      // Expand
      for (let i = ITEMS_LIMIT; i < rows.length; i++) {
        const row = rows[i];
        row.style.display = "flex";

        row.animate(
          [
            { opacity: 0, transform: "translateY(5px)" },
            { opacity: 1, transform: "translateY(0)" },
          ],
          { duration: 300, fill: "forwards", easing: "ease-out" }
        );
      }

      // Hide button
      btnWrapper.style.display = "none";
    });
  };

  // Initial load
  const initial = wrapper.querySelector(".pricing-right-content");
  if (initial && initial.innerHTML.trim()) {
    state.cache[0] = initial.innerHTML;
    initLoadMore(initial);
  }

  // --- Fetch helper ---
  const fetchTab = async (i) => {
    if (state.cache[i]) return state.cache[i];

    const fd = new FormData();
    fd.append("action", "load_pricing_tab");
    fd.append("tab_index", i);
    if (nonce) fd.append("nonce", nonce);
    if (postId) fd.append("post_id", postId);

    try {
      const r = await fetch(ajaxUrl, { method: "POST", body: fd });
      if (!r.ok) throw new Error(r.status);
      const json = await r.json();
      const html = json?.data?.html || "";
      if (html) state.cache[i] = html;
      return html;
    } catch (e) {
      console.error("Pricing AJAX error:", e);
      return "";
    }
  };

  // --- Swap Content ---
  const swapContent = async (html, runId) => {
    const old = wrapper.querySelector(".pricing-right-content");

    const addNew = () => {
      if (runId !== state.runId) return;

      const el = document.createElement("div");
      el.className = "pricing-right-content pricing-right-content--fade-in";
      el.innerHTML = html;
      wrapper.appendChild(el);
      initLoadMore(el);
    };

    if (!old) return addNew();

    old.classList.add("pricing-right-content--fade-out");
    old.addEventListener(
      "animationend",
      () => {
        old.remove();
        addNew();
      },
      { once: true }
    );
  };

  // --- Load Manager ---
  const loadTab = async (i) => {
    if (state.loading || i === state.active) return;

    state.loading = true;
    const runId = ++state.runId;

    const html = await fetchTab(i);

    if (runId === state.runId && html) {
      await swapContent(html, runId);
      state.active = i;
    }

    if (runId === state.runId) {
      state.loading = false;
    }
  };

  // --- Prefetch ---
  const prefetch = () => {
    const others = tabs.map((t) => +t.dataset.tabIndex).filter((i) => i !== 0);

    Promise.all(others.map(fetchTab)).catch(() => {});
  };

  // --- UI Update ---
  const activateTabUI = (el) => {
    tabs.forEach((t) => {
      t.classList.remove("pricing-tab--active");
      t.setAttribute("aria-selected", "false");
    });
    el.classList.add("pricing-tab--active");
    el.setAttribute("aria-selected", "true");
  };

  // --- Event Listener ---
  tabsContainer.addEventListener("click", (e) => {
    const tab = e.target.closest(".pricing-tab");
    if (!tab) return;

    const i = parseInt(tab.dataset.tabIndex, 10);
    if (Number.isNaN(i)) return;

    activateTabUI(tab);
    loadTab(i);
  });

  // Start prefetch
  window.requestIdleCallback?.(prefetch) || setTimeout(prefetch, 500);
};

// Init
document.readyState === "loading"
  ? document.addEventListener("DOMContentLoaded", initPricingTabs)
  : initPricingTabs();

export default initPricingTabs;
