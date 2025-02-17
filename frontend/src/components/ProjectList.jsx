import React, { useState, useEffect } from "react";
import Project from "./Project";

function ProjectList() {
  const [projects, setProjects] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8000/api/projects")
      .then((res) => res.json())
      .then((respObj) => setProjects(respObj.data))
      .catch((error) => console.error("Error fetching projects:", error));
  }, []);

  return (
    <div>
      {projects.length > 0 ? (
        projects.map((project) => (
          <Project key={project.id} project={project} />
        ))
      ) : (
        <p>Loading projects...</p>
      )}
    </div>
  );
}

export default ProjectList;