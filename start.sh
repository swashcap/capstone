#!/bin/bash

gulp
docker build -t wtf .
docker-compose up -d

