ssh_private_key=`cat ~/.ssh/id_rsa`
project_name="graduation-project"

.PHONY: all
all: build up

.PHONY: build
build:
	PROJECT_NAME="$(project_name)" docker compose build --build-arg SSH_PRIVATE_KEY="${ssh_private_key}"

.PHONY: up
up:
	PROJECT_NAME="$(project_name)" docker compose up --no-build
