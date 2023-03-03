<template>
  <transition :name="getLoading.transition">
    <div tabindex="0"
         class="vl-overlay vl-active vl-full-page"
         v-show="getLoading.show"
         :aria-busy="getLoading.show"
         aria-label="Loading"
    >
      <div class="vl-background"/>
      <div class="vl-icon">
        <svg viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" :width="getLoading.iconWidth"
             :height="getLoading.iconHeight" :stroke="getLoading.color">
          <g fill="none" fill-rule="evenodd">
            <g transform="translate(1 1)" stroke-width="2">
              <circle stroke-opacity=".25" cx="18" cy="18" r="18"/>
              <path d="M36 18c0-9.94-8.06-18-18-18">
                <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 18 18"
                    to="360 18 18"
                    dur="0.8s"
                    repeatCount="indefinite"/>
              </path>
            </g>
          </g>
        </svg>
      </div>
    </div>
  </transition>
</template>

<script>
import { mapState } from 'pinia'
import { useGlobalStore } from '../../stores/global'

export default {
  name: 'LoadingScreen',
  computed: {
    ...mapState(useGlobalStore, { getLoading: 'getLoading' }),
  },
}
</script>

<style scoped>
.vl-overlay {
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  align-items: center;
  display: none;
  justify-content: center;
  overflow: hidden;
  z-index: 9999;
}

.vl-overlay.vl-active {
  display: flex;
}

.vl-overlay.vl-full-page {
  z-index: 9999;
  position: fixed;
}

.vl-overlay .vl-background {
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  background: #fff;
  opacity: 0.5;
}

.vl-overlay .vl-icon {
  position: relative;
}
</style>