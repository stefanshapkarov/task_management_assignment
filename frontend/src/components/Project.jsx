import React, { useState } from "react";

function Project({ project }) {
    const [showTasks, setShowTasks] = useState(false);

    const toggleTasks = () => {
        setShowTasks(!showTasks);
    };

    return (
        <div>
            <h2>Name: {project.name}</h2>
            <p>Description: {project.description}</p>
            <p>Due Date: {project.due_date}</p>
            <button onClick={toggleTasks} style={{ marginBottom: "10px" }}>
                {showTasks ? "Hide Tasks" : "Show Tasks"}
            </button>
            {showTasks && (
                <div>
                    {project.tasks.length > 0 ? (
                        project.tasks.map((task) => (
                            <div>
                                <p>Task: {task.title}</p>
                                <p>Status: {task.status}</p>
                                <p>Due Date: {task.due_date}</p>
                            </div>
                        ))
                    ) : (
                        <p>No tasks for this project</p>
                    )}
                </div>
            )}
            <hr style={{ width: "50%", margin: "auto" }}></hr>
        </div>
    );
}

export default Project;