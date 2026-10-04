const menuButton = document.querySelector(".menu-toggle");
const navigation = document.querySelector(".site-nav");

if (menuButton && navigation) {
  menuButton.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-expanded", String(!isOpen));
    menuButton.setAttribute("aria-label", isOpen ? "Abrir menú" : "Cerrar menú");
    navigation.classList.toggle("is-open", !isOpen);
  });

  navigation.addEventListener("click", (event) => {
    if (event.target instanceof HTMLAnchorElement) {
      menuButton.setAttribute("aria-expanded", "false");
      menuButton.setAttribute("aria-label", "Abrir menú");
      navigation.classList.remove("is-open");
    }
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && menuButton.getAttribute("aria-expanded") === "true") {
      menuButton.setAttribute("aria-expanded", "false");
      menuButton.setAttribute("aria-label", "Abrir menú");
      navigation.classList.remove("is-open");
      menuButton.focus();
    }
  });
}

const memoryForm = document.querySelector("#memory-form");
const memoryList = document.querySelector("#memory-list");
const memoryStatus = document.querySelector("#memory-status");

if (memoryForm instanceof HTMLFormElement && memoryList && memoryStatus) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") ?? "";

  const showListMessage = (message, isError = false) => {
    const notice = document.createElement("p");
    notice.className = isError ? "memory-empty memory-error" : "memory-empty";
    notice.textContent = message;
    memoryList.replaceChildren(notice);
  };

  const createMemoryCard = (memory) => {
    const card = document.createElement("article");
    card.className = "memory-card";

    const header = document.createElement("div");
    header.className = "memory-card-heading";

    const name = document.createElement("h4");
    name.textContent = memory.name;

    const region = document.createElement("span");
    region.className = "memory-region";
    region.textContent = memory.region;

    const message = document.createElement("p");
    message.className = "memory-message";
    message.textContent = memory.memory;

    const date = document.createElement("time");
    date.className = "memory-date";
    date.textContent = memory.created_at;

    header.append(name, region);
    card.append(header, message, date);
    return card;
  };

  const loadMemories = async () => {
    memoryList.setAttribute("aria-busy", "true");
    showListMessage("Cargando recuerdos...");

    try {
      const response = await fetch("api/recuerdos.php", {
        headers: { Accept: "application/json" },
      });
      const data = await response.json();

      if (!response.ok || !Array.isArray(data.memories)) {
        throw new Error(data.error || "No fue posible cargar los recuerdos.");
      }

      if (data.memories.length === 0) {
        showListMessage("Aún no hay recuerdos. ¡Puedes compartir el primero!");
        return;
      }

      memoryList.replaceChildren(...data.memories.map(createMemoryCard));
    } catch (error) {
      showListMessage(
        error instanceof Error ? error.message : "No fue posible cargar los recuerdos.",
        true,
      );
    } finally {
      memoryList.removeAttribute("aria-busy");
    }
  };

  memoryForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    memoryStatus.textContent = "";

    const submitButton = memoryForm.querySelector('button[type="submit"]');
    if (!(submitButton instanceof HTMLButtonElement)) {
      memoryStatus.textContent = "No fue posible enviar el recuerdo.";
      return;
    }

    submitButton.disabled = true;
    memoryForm.setAttribute("aria-busy", "true");

    const formData = new FormData(memoryForm);
    const payload = {
      name: formData.get("name"),
      region: formData.get("region"),
      memory: formData.get("memory"),
    };

    try {
      const response = await fetch("api/recuerdos.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          "X-CSRF-Token": csrfToken,
        },
        body: JSON.stringify(payload),
      });
      const data = await response.json();

      if (!response.ok || !data.memory) {
        throw new Error(data.error || "No fue posible guardar el recuerdo.");
      }

      const emptyState = memoryList.querySelector(".memory-empty");
      if (emptyState) {
        memoryList.replaceChildren();
      }
      memoryList.prepend(createMemoryCard(data.memory));
      while (memoryList.children.length > 8) {
        memoryList.lastElementChild?.remove();
      }

      memoryForm.reset();
      memoryStatus.textContent = "¡Gracias por compartirlo! Tu recuerdo ya está publicado.";
    } catch (error) {
      memoryStatus.textContent = error instanceof Error
        ? error.message
        : "No fue posible guardar el recuerdo. Inténtalo de nuevo.";
    } finally {
      submitButton.disabled = false;
      memoryForm.removeAttribute("aria-busy");
    }
  });

  loadMemories();
}
