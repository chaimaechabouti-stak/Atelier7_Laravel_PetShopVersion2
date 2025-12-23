import React, { useState, useRef } from "react";

export default function PreferencesApp() {
  // 1) Mode de notification (radio)
  const [notification, setNotification] = useState("");

  // 2) Select dynamique (villes)
  const [cities, setCities] = useState(["Tanger", "Rabat", "Casablanca"]);
  const [selectedCity, setSelectedCity] = useState("");
  const [newCity, setNewCity] = useState("");

  const addCity = () => {
    const city = newCity.trim();
    if (!city) return;
    if (cities.includes(city)) {
      setNewCity("");
      return;
    }
    setCities((prev) => [...prev, city]);
    setNewCity("");
  };

  // 3) Checkboxes (useRef)
  const checkboxRefs = useRef([]);
  const skillsList = ["React", "Node.js", "PHP", "JavaScript"];
  const [skills, setSkills] = useState([]);

  const updateSkills = () => {
    const selected = checkboxRefs.current
      .filter((cb) => cb && cb.checked)
      .map((cb) => cb.value);
    setSkills(selected);
  };

  const selectAll = () => {
    checkboxRefs.current.forEach((cb) => {
      if (cb) cb.checked = true;
    });
    updateSkills();
  };

  const deselectAll = () => {
    checkboxRefs.current.forEach((cb) => {
      if (cb) cb.checked = false;
    });
    updateSkills();
  };

  return (
    <div style={{ padding: 20, fontFamily: "Arial, sans-serif", maxWidth: 720 }}>
      <h1>Préférences utilisateur</h1>

      {/* 1. Mode de notification */}
      <section style={{ marginBottom: 18 }}>
        <h3>1. Mode de notification</h3>
        <label style={{ marginRight: 12 }}>
          <input
            type="radio"
            name="notif"
            value="email"
            onChange={(e) => setNotification(e.target.value)}
          />{" "}
          Email
        </label>
        <label>
          <input
            type="radio"
            name="notif"
            value="sms"
            onChange={(e) => setNotification(e.target.value)}
          />{" "}
          SMS
        </label>

        {/* message conditionnel */}
        {notification === "email" && (
          <p>Vous recevrez vos notifications par <b>email</b>.</p>
        )}
        {notification === "sms" && (
          <p>Vous recevrez vos notifications par <b>SMS</b>.</p>
        )}
      </section>

      {/* 2. Ville dynamique */}
      <section style={{ marginBottom: 18 }}>
        <h3>2. Ville</h3>
        <div style={{ marginBottom: 8 }}>
          <select
            value={selectedCity}
            onChange={(e) => setSelectedCity(e.target.value)}
          >
            <option value="">-- Choisir une ville --</option>
            {cities.map((c) => (
              <option key={c} value={c}>
                {c}
              </option>
            ))}
          </select>
        </div>

        <div>
          <input
            placeholder="Ajouter une ville"
            value={newCity}
            onChange={(e) => setNewCity(e.target.value)}
          />
          <button type="button" onClick={addCity} style={{ marginLeft: 8 }}>
            Ajouter
          </button>
        </div>
      </section>

      {/* 3. Compétences (checkboxes) */}
      <section style={{ marginBottom: 18 }}>
        <h3>3. Compétences</h3>

        {skillsList.map((skill, idx) => (
          <div key={skill}>
            <label>
              <input
                type="checkbox"
                value={skill}
                ref={(el) => (checkboxRefs.current[idx] = el)}
                onChange={updateSkills}
              />{" "}
              {skill}
            </label>
          </div>
        ))}

        <div style={{ marginTop: 8 }}>
          <button type="button" onClick={selectAll}>
            Tout sélectionner
          </button>
          <button type="button" onClick={deselectAll} style={{ marginLeft: 8 }}>
            Tout désélectionner
          </button>
        </div>

        <div style={{ marginTop: 10 }}>
          <strong>Compétences sélectionnées :</strong>
          {skills.length === 0 ? (
            <p>Aucune compétence sélectionnée.</p>
          ) : (
            <ul>
              {skills.map((s) => (
                <li key={s}>{s}</li>
              ))}
            </ul>
          )}
        </div>
      </section>

      {/* 4. Rendu conditionnel / section récap */}
      <section style={{ marginBottom: 18 }}>
        <h3>4. Récapitulatif</h3>
        <p>
          <strong>Mode notification :</strong>{" "}
          {notification ? notification : "Non défini"}
        </p>
        <p>
          <strong>Ville :</strong> {selectedCity || "Non définie"}
        </p>
        <p>
          <strong>Compétences :</strong>{" "}
          {skills.length > 0 ? skills.join(", ") : "Aucune"}
        </p>
      </section>
    </div>
  );
}
